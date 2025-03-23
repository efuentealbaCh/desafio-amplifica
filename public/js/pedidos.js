$(document).ready(function () {
    let total = 0;
    let productosCarrito = [];

    $('#addButton').click(function () {
        const productoId = $('#producto').val();
        const cantidad = parseInt($('#cantidad').val());
        const peso = parseFloat($('#peso').val());

        if (!productoId || !cantidad || !peso) {
            Swal.fire({
                icon: "error",
                title: "Debe completar los campos de producto, peso y cantidad obligatoriamente.",
                text: `${error.error}`,
              });

            return;
        }

        const producto = {
            id: productoId,
            cantidad: cantidad,
            peso: peso,
            subtotal: productoId * cantidad
        };

        productosCarrito.push(producto);

        $('#carrito').append(`
            <tr data-producto-id="${productoId}">
                <td>${productoId}</td>
                <td>${cantidad}</td>
                <td>${peso} kg</td>
                <td>${(productoId * cantidad).toFixed(2)}</td>
                <td><button class="btn btn-danger btn-sm eliminar">Eliminar</button></td>
            </tr>
        `);

        total += producto.subtotal;
        $('#total').text(total.toFixed(2));
        $('#producto').val('');
        $('#cantidad').val('');
        $('#peso').val('');
    });

    $('#carrito').on('click', '.eliminar', function () {
        const row = $(this).closest('tr');
        const productoId = row.data('producto-id');
        const cantidad = parseInt(row.find('td:eq(1)').text());
        const peso = parseFloat(row.find('td:eq(2)').text());

        productosCarrito = productosCarrito.filter(item => item.id !== productoId || item.cantidad !== cantidad || item.peso !== peso);

        row.remove();

        total -= cantidad * peso;
        $('#total').text(total.toFixed(2));
    });

    $('#cotizar-pedido').click(function () {
        const comuna = $('#comuna').val();

        if (!comuna || productosCarrito.length === 0) {
            Swal.fire({
                icon: "error",
                title: "Debe seleccionar una comuna y temer elementos en el carrito de compras",
                text: `${error.error}`,
              });
            return;
        }

        const products = productosCarrito.map(item => ({
            weight: item.peso,
            quantity: item.cantidad
        }));

        $.ajax({
            url: `${window.location.origin}/api/getRate`,
            type: 'POST',
            data: JSON.stringify({
                comuna: comuna,
                products: products
            }),
            contentType: 'application/json',
            success: function (data) {
                $('#tarifas').empty();
                data.forEach(function (tarifa) {
                    $('#tarifas').append(`
                        <tr>
                            <td>${tarifa.name}</td>
                            <td>${tarifa.code}</td>
                            <td>${tarifa.price}</td>
                            <td>${tarifa.transitDays}</td>
                        </tr>
                    `);
                });
                $('#tarifas-container').show();
            },
            error: function (xhr, status, error) {
                alert('Error al obtener las tarifas: ' + error);
            }
        });
    });
});
