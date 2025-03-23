$(document).ready(function() {
    $.ajax({
        url: `${window.location.origin}/api/regiones`,
        type: "GET",
        success: function(data) {
            $('#region').empty();
            $('#region').append('<option value="">Seleccione una región</option>');
            $.each(data, function(index, region) {
                $('#region').append(
                    `<option value="${region.code}">${region.region}</option>`);
            });
        },
        error: function(xhr, status, error) {
            console.error("Error al cargar las regiones: " + error);
        }
    });
    $('#region').change(function() {
        var regionCode = $(this).val();

        if (regionCode) {
            $.ajax({
                url: `${window.location.origin}/api/regiones`,
                type: "GET",
                success: function(data) {
                    $('#comuna').empty();
                    $('#comuna').append(
                        '<option value="">Seleccione una comuna</option>');

                    $.each(data, function(index, region) {
                        if (region.code == regionCode) {
                            $.each(region.comunas, function(index, comuna) {
                                $('#comuna').append(
                                    `<option value="${comuna}">${comuna}</option>`
                                    );
                            });
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar las comunas: " + error);
                }
            });
        } else {
            $('#comuna').empty();
            $('#comuna').append('<option value="">Seleccione una comuna</option>');
        }
    });
});
