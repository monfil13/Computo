<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobiliario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="section" align="center">
        <h2>Mobiliario</h2>
        <button onclick="openAddMobiliarioModal()" class="btn btn-info">Agregar Mobiliario</button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#searchModal">Buscar</button>
        <a href="<?= base_url('admin/inicio') ?>" class="btn btn-success">Volver al menú</a>
        <h2> </h2>
        <!-- Contenedor para las tarjetas de mobiliario -->
        <div class="card-container">
            <?php foreach ($mobiliario as $item) : ?>
                <div class="card border-primary"> <!-- Agregamos la clase "border-primary" para establecer el color del borde -->
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['nombre'] ?></h5>
                        <p class="card-text">
                            <strong>Cantidad:</strong> <?= $item['cantidad'] ?><br>
                            <strong>Tipo:</strong> <?= $item['tipo'] ?><br>
                            <strong>Proveedor:</strong> <?= $item['nombreProveedor'] ?>
                        </p>
                        <div class="btn-group">
                            <button onclick="editMobiliarioModal(<?= $item['idMobiliario'] ?>, '<?= $item['nombre'] ?>', <?= $item['cantidad'] ?>, '<?= $item['tipo'] ?>', <?= $item['idProveedor'] ?>)" class="btn btn-primary">Editar</button>
                            <a href="<?= base_url('admin/mobiliario/delete/' . $item['idMobiliario']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este mobiliario?')">Eliminar</a>
                        </div>
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
                    <h5 class="modal-title" id="searchModalLabel">Buscar Mobiliario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/mobiliario/search') ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar mobiliario">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>


<!-- Modal para agregar mobiliario -->
<div id="addMobiliarioModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAddMobiliarioModal()">&times;</span>
        <h2>Agregar Mobiliario</h2>
        <form id="addMobiliarioForm" action="<?= base_url('admin/mobiliario/store') ?>" method="post">
            <label for="addMobiliarioNombre">Nombre:</label><br>
            <input type="text" id="addMobiliarioNombre" name="nombre" required><br>
            <label for="addMobiliarioCantidad">Cantidad:</label><br>
            <input type="number" id="addMobiliarioCantidad" name="cantidad" required><br>
            <label for="addMobiliarioTipo">Tipo:</label><br>
            <input type="text" id="addMobiliarioTipo" name="tipo" required><br>
            <label for="addMobiliarioProveedor">Proveedor:</label><br>
            <select id="addMobiliarioProveedor" name="idProveedor" required>
                <?php foreach ($proveedores as $proveedor) : ?>
                    <option value="<?= $proveedor['idProveedor'] ?>"><?= $proveedor['nombre'] ?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="submit" value="Guardar Mobiliario" class="btn btn-success">
        </form>
    </div>
</div>

<!-- Modal para editar mobiliario -->
<div id="editMobiliarioModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditMobiliarioModal()">&times;</span>
        <h2>Editar Mobiliario</h2>
        <form id="editMobiliarioForm" action="<?= base_url('admin/mobiliario/update') ?>" method="post">
            <input type="hidden" id="editMobiliarioId" name="idMobiliario">
            <label for="editMobiliarioNombre">Nombre:</label><br>
            <input type="text" id="editMobiliarioNombre" name="nombre" required><br>
            <label for="editMobiliarioCantidad">Cantidad:</label><br>
            <input type="number" id="editMobiliarioCantidad" name="cantidad" required><br>
            <label for="editMobiliarioTipo">Tipo:</label><br>
            <input type="text" id="editMobiliarioTipo" name="tipo" required><br>
            <label for="editMobiliarioProveedor">Proveedor:</label><br>
            <select id="editMobiliarioProveedor" name="idProveedor" required>
                <?php foreach ($proveedores as $proveedor) : ?>
                    <option value="<?= $proveedor['idProveedor'] ?>"><?= $proveedor['nombre'] ?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="submit" value="Guardar Cambios" class="btn btn-success">
        </form>
    </div>
</div>

<script>
    // Función para abrir el modal de agregar mobiliario
    function openAddMobiliarioModal() {
        document.getElementById('addMobiliarioModal').style.display = 'block';
    }

    // Función para cerrar el modal de agregar mobiliario
    function closeAddMobiliarioModal() {
        document.getElementById('addMobiliarioModal').style.display = 'none';
    }

    // Función para abrir el modal de edición de mobiliario
    function editMobiliarioModal(id, nombre, cantidad, tipo, idProveedor) {
        document.getElementById('editMobiliarioId').value = id;
        document.getElementById('editMobiliarioNombre').value = nombre;
        document.getElementById('editMobiliarioCantidad').value = cantidad;
        document.getElementById('editMobiliarioTipo').value = tipo;
        document.getElementById('editMobiliarioProveedor').value = idProveedor;
        document.getElementById('editMobiliarioModal').style.display = 'block';
    }

    // Función para cerrar el modal de edición de mobiliario
    function closeEditMobiliarioModal() {
        document.getElementById('editMobiliarioModal').style.display = 'none';
    }
</script>
</body>

</html>