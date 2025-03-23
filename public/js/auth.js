$(document).ready(function() {
    $("#login-form").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: `${window.location.origin}/api/auth`,
            type: "POST",
            data: {
                username: $("#username").val(),
                password: $("#password").val(),
                _token: $("input[name=_token]").val()
            },
            success: function(response) {
                window.location.href = "/pedidos";
            },
            error: function(xhr) {
                error = JSON.parse(xhr.responseText)
                Swal.fire({
                    icon: "error",
                    title: "Error al iniciar sesión",
                    text: `${error.error}`,
                  });
            }
        });
    });
});
