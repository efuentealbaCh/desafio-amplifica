<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Pedidos con Eliacer</title>
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bundles/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">

    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('img/favicon.ico') }}' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form id="login-form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input id="username" type="email" class="form-control" name="username"
                                            required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#login-form").submit(function(event) {
                event.preventDefault(); // Evita que el formulario se envíe de la manera tradicional

                $.ajax({
                    url: `${window.location.origin}/api/auth`, // Asegúrate de que esta URL es correcta
                    type: "POST",
                    data: {
                        username: $("#username").val(),
                        password: $("#password").val(),
                        _token: $("input[name=_token]").val() // Enviar el token CSRF
                    },
                    success: function(response) {
                        window.location.href = "/pedidos"; // Redirige después del login
                    },
                    error: function(xhr) {
                        console.error("Error en autenticación:", xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>
