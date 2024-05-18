<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="section" align="center">
        <h2>Equipos</h2>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#searchModal">Buscar</button>
        <a href="<?= base_url('lectura/inicioL') ?>" class="btn btn-success">Volver al menú</a>
        <h2> </h2>

        <!-- Contenedor para las tarjetas de equipos -->
        <div class="card-container">
            <?php foreach ($equipos as $equipo) : ?>
                <div class="card border-primary"> <!-- Agregamos la clase "border-primary" para establecer el color del borde -->
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
    <!-- Paginación -->
    <div class="pagination" style="button-align: center;">
        <?= $pager->links() ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Inicializar los componentes de Bootstrap
        var myModal = new bootstrap.Modal(document.getElementById('searchModal'));
    </script>

    <!-- Modal de búsqueda -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">Buscar Equipos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('lectura/equiposL/searchL') ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar equipos">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</body>

</html>