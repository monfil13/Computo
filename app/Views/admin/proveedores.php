<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="section" align="center">
    <h2>Proveedores</h2>
        <button onclick="openAddProveedorModal()" class="btn btn-primary">Agregar Proveedor</button>
        <a href="inicio" class="btn btn-success">Volver al menú</a>
<h3> </h3>
        <!-- Contenedor para las tarjetas de proveedores -->
        <div class="card-container">
            <?php foreach ($proveedores as $proveedor): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $proveedor['nombre'] ?></h5>
                        <p class="card-text">
                            <strong>Teléfono:</strong> <?= $proveedor['telefono'] ?><br>
                            <strong>Correo:</strong> <?= $proveedor['correo'] ?><br>
                            <strong>Dirección:</strong> <?= $proveedor['direccion'] ?>
                        </p>
                        <div class="btn-group">
                            <button onclick="editProveedorModal(<?= $proveedor['idProveedor'] ?>, '<?= $proveedor['nombre'] ?>', '<?= $proveedor['telefono'] ?>', '<?= $proveedor['correo'] ?>', '<?= $proveedor['direccion'] ?>')" class="btn btn-primary">Editar</button>
                            <a href="<?= base_url('proveedores/delete/' . $proveedor['idProveedor']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?')">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>


    <!-- Modal para agregar proveedor -->
    <div id="addProveedorModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddProveedorModal()">&times;</span>
            <h2>Agregar Proveedor</h2>
            <form id="addProveedorForm" action="<?= base_url('proveedores/store') ?>" method="post">
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
            <form id="editProveedorForm" action="<?= base_url('proveedores/update') ?>" method="post">
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
