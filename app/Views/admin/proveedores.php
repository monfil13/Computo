<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="section" align="center">
    <h2>Proveedores</h2>
        <button onclick="openAddProveedorModal()" class="btn btn-info">Agregar Proveedor</button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#searchModal">Buscar</button>
        <a href="<?= base_url('admin/inicio') ?>" class="btn btn-success">Volver al menú</a>
<h3> </h3>
<div class="container">
    <table class="table table-bordered custom-border">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proveedores as $proveedor) : ?>
                <tr>
                    <td><?= $proveedor['nombre'] ?></td>
                    <td><?= $proveedor['telefono'] ?></td>
                    <td><?= $proveedor['correo'] ?></td>
                    <td><?= $proveedor['direccion'] ?></td>
                    <td>
                        <button onclick="editProveedorModal(<?= $proveedor['idProveedor'] ?>, '<?= $proveedor['nombre'] ?>', '<?= $proveedor['telefono'] ?>', '<?= $proveedor['correo'] ?>', '<?= $proveedor['direccion'] ?>')" class="btn btn-primary">Editar</button>
                        <a href="<?= base_url('admin/proveedores/delete/' . $proveedor['idProveedor']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
                <h5 class="modal-title" id="searchModalLabel">Buscar Proveedores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/proveedores/search') ?>" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Buscar proveedores">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>


    <!-- Modal para agregar proveedor -->
    <div id="addProveedorModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddProveedorModal()">&times;</span>
            <h2>Agregar Proveedor</h2>
            <form id="addProveedorForm" action="<?= base_url('admin/proveedores/store') ?>" method="post">
                <label for="addProveedorName">Nombre:</label><br>
                <input type="text" id="addProveedorName" name="nombre" required><br>
                <label for="addProveedorPhone">Teléfono:</label><br>
                <input type="text" id="addProveedorPhone" name="telefono" required><br>
                <label for="addProveedorEmail">Correo:</label><br>
                <input type="email" id="addProveedorEmail" name="correo" required><br>
                <label for="addProveedorAddress">Dirección:</label><br>
                <textarea id="addProveedorAddress" name="direccion" required></textarea><br>
                <input type="submit" value="Guardar Proveedor" class="btn btn-success">
            </form>
        </div>
    </div>

    <!-- Modal para editar proveedor -->
    <div id="editProveedorModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditProveedorModal()">&times;</span>
            <h2>Editar Proveedor</h2>
            <form id="editProveedorForm" action="<?= base_url('admin/proveedores/update') ?>" method="post">
                <input type="hidden" id="editProveedorId" name="idProveedor">
                <label for="editProveedorName">Nombre:</label><br>
                <input type="text" id="editProveedorName" name="nombre" required><br>
                <label for="editProveedorPhone">Teléfono:</label><br>
                <input type="text" id="editProveedorPhone" name="telefono" required><br>
                <label for="editProveedorEmail">Correo:</label><br>
                <input type="email" id="editProveedorEmail" name="correo" required><br>
                <label for="editProveedorAddress">Dirección:</label><br>
                <textarea id="editProveedorAddress" name="direccion" required></textarea><br>
                <button type="button" onclick="saveProveedorChanges()" class="btn btn-success">Guardar Cambios</button>
            </form>
        </div>
    </div>

    <script>
        // Variable global para almacenar el ID del proveedor que se está editando
        var proveedorIdToEdit = null;

        // Función para abrir el modal de editar proveedor y llenar los campos con los datos del proveedor a editar
        function editProveedorModal(id, nombre, telefono, correo, direccion) {
            // Guardar el ID del proveedor que se está editando
            proveedorIdToEdit = id;

            // Llenar los campos del formulario de edición con los datos del proveedor
            document.getElementById('editProveedorId').value = id;
            document.getElementById('editProveedorName').value = nombre;
            document.getElementById('editProveedorPhone').value = telefono;
            document.getElementById('editProveedorEmail').value = correo;
            document.getElementById('editProveedorAddress').value = direccion;

            // Abrir el modal de edición
            document.getElementById('editProveedorModal').style.display = 'block';
        }

        // Función para cerrar el modal de editar proveedor
        function closeEditProveedorModal() {
            document.getElementById('editProveedorModal').style.display = 'none';
        }

        // Función para guardar los cambios del proveedor
        function saveProveedorChanges() {
            // Obtener los valores actualizados del formulario
            var id = proveedorIdToEdit;
            var nombre = document.getElementById('editProveedorName').value;
            var telefono = document.getElementById('editProveedorPhone').value;
            var correo = document.getElementById('editProveedorEmail').value;
            var direccion = document.getElementById('editProveedorAddress').value;

            // Aquí puedes agregar validaciones de datos si es necesario

            // Enviar los datos actualizados al servidor (puedes usar AJAX o simplemente enviar un formulario)
            // Por ejemplo, si estás utilizando un formulario, podrías hacer algo como:
            document.getElementById('editProveedorForm').submit();
        }

        // Función para abrir el modal de agregar proveedor
        function openAddProveedorModal() {
            document.getElementById('addProveedorModal').style.display = 'block';
        }

        // Función para cerrar el modal de agregar proveedor
        function closeAddProveedorModal() {
            document.getElementById('addProveedorModal').style.display = 'none';
        }
    </script>
</body>

</html>
