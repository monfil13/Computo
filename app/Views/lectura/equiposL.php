<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="section" align="center">
    <h2>Equipos</h2>
        <a href="inicioL" class="btn btn-success">Volver al menú</a>
        <h2> </h2>

        <!-- Contenedor para las tarjetas de equipos -->
        <div class="card-container">
            <?php foreach ($equipos as $equipo): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $equipo['nombre'] ?></h5>
                        <p class="card-text">
                            <strong>Marca:</strong> <?= $equipo['marca'] ?><br>
                            <strong>Modelo:</strong> <?= $equipo['modelo'] ?><br>
                            <strong>Descripción:</strong> <?= $equipo['descripcion'] ?><br>
                            <strong>Tipo:</strong> <?= $equipo['tipo'] ?><br>
                            <strong>Estado:</strong> <?= $equipo['estado'] ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</body>
</html>
