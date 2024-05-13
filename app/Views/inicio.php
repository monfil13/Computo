<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio</title>
</head>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="background">
        <div class="container d-flex justify-content-center align-items-center vh-100">
                <div class="card-body" align="center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTi14mnED_INEAan4Cav6LXQmxxhYKN5YjDpQJw4x4Z4VO1N1abdtwGomH2j_WuDfWIojo&usqp=CAU" 
                    alt="UPN Image" width="200"><br><br>
                    <h1 class="card-title" style="color: #0033a0;">Centro de Cómputo UPN 212</h1>
                    <h3>¿Qué sección desea consultar?</h3>
                    <nav class="navbar navbar-expand-lg navbar-dark justify-content-center">
                        <ul class="navbar-nav">
                            <li><a class="btn btn-outline-primary border border-dark" style="color: black;"
                                href="<?= base_url('users')?>">Usuarios👤</a></li><br>
                            <li><a class="btn btn-outline-success border border-dark" style="color: black;"
                                href="<?= base_url('equipos')?>">Equipos🖥️</a></li><br>
                                <li><a class="btn btn-outline-success border border-dark" style="color: black;"
                                href="<?= base_url('mobiliario')?>">Mobiliario🪑</a></li><br>
                            <li><a class="btn btn-outline-warning border border-dark" style="color: black;"
                                href="<?= base_url('mantenimiento')?>">Mantenimiento⚙️</a></li><br>
                                <li><a class="btn btn-outline-warning border border-dark" style="color: black;"
                                href="<?= base_url('proveedores')?>">Proveedores🚛</a></li><br>
                        </ul>
                    </nav>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
