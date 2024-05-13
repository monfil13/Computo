<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobiliario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="section" align="center">
    <h2>Mobiliario</h2>
        <a href="inicioL" class="btn btn-success">Volver al menú</a>
        <h2> </h2> <!-- Añadí este espacio para mantener el espacio entre el título y las tarjetas -->
        <!-- Contenedor para las tarjetas de mobiliario -->
        <div class="card-container">
            <?php foreach ($mobiliario as $item): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['nombre'] ?></h5>
                        <p class="card-text">
                            <strong>Cantidad:</strong> <?= $item['cantidad'] ?><br>
                            <strong>Tipo:</strong> <?= $item['tipo'] ?><br>
                            <strong>Proveedor:</strong> <?= $item['nombreProveedor'] ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</body>
</html>
