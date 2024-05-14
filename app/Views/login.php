<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Inicio de Sesión</title>
    <style>
        body {
            background: #ffffff; /* Blanco */
            color: #000000; /* Negro */
        }
        .container {
            margin-top: 100px;
        }
        .form-control {
            background-color: #ffffff; /* Blanco */
            color: #ffffff; /* Blanco */
            border-color: #1f2d3a; /* Gris oscuro */
            font-size: 14px; /* Tamaño de fuente reducido */
            max-width: 300px; /* Ancho máximo del campo de entrada */
            margin: auto; /* Centrar horizontalmente */
        }
        .btn-primary {
            background-color: #2728C0; /* Nuevo color de fondo */
            border-color: #0056b3; /* Azul eléctrico más oscuro */
            font-size: 16px; /* Tamaño de fuente ligeramente reducido */
            width: 200px; /* Ancho del botón */
            margin-top: 15px; /* Espacio superior */
            display: block; /* Para centrar con margin auto */
            margin-left: auto; /* Centrar horizontalmente */
            margin-right: auto; /* Centrar horizontalmente */
        }
        label {
            font-size: 14px; /* Tamaño de fuente reducido para labels */
        }
        .logo {
            width: 300px; /* Aumento del tamaño de la imagen */
            display: block; /* Centrar la imagen horizontalmente */
            margin: auto; /* Centrar la imagen horizontalmente */
        }
        .text-center-container {
            text-align: center; /* Centrar el texto horizontalmente */
            margin-bottom: 20px; /* Espacio entre el texto y el formulario */
        }
        .form-group {
            text-align: center; /* Centrar el contenido horizontalmente */
        }
    </style>
</head>
<body>
<?php if(session()->has('error')): ?>
    <div id="error-message" class="alert alert-danger text-center" role="alert">
        <?= session('error') ?>
    </div>
    <style>
        #error-message {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
    <script>
        // Esperar a que el documento esté listo
        $(document).ready(function() {
            // Ocultar el mensaje de error después de 4 segundos
            setTimeout(function() {
                $("#error-message").fadeOut();
            }, 4000);
        });
    </script>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- UPN Logo -->
            <img src="upn.jpg" alt="UPN Logo" width="400">
        </div>
        <div class="col-md-6">
            <div class="text-center-container">
                <h2 class="mt-3">Inicio de Sesión</h2>
                <p>Centro de Cómputo UPN 212 Teziutlán</p>
            </div>
            <form action="<?php echo base_url('/login') ?>" method="POST">
                <div class="form-group">
                    <label for="usuario" class="mt-3">Usuario</label> <!-- Aumento del espacio entre la imagen y el label -->
                    <input type="text" name="usuario" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" required="">
                </div>
                <br>
                <button class="btn btn-primary">Acceder</button> <!-- Aumento del espacio entre el campo de contraseña y el botón -->
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
