<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <h2 align="center">Usuarios</h2>
    <div class="section" align="center">
        <button onclick="openAddUserModal()" class="btn btn-info">Agregar Usuario</button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#searchModal">Buscar</button>
        <a href="<?= base_url('admin/inicio') ?>" class="btn btn-success">Volver al menú</a>
        <h3> </h3>
        <!-- Contenedor para las tarjetas de usuarios -->
        <div class="card-container">
            <!-- Itera sobre los usuarios -->
            <?php foreach ($users as $user) : ?>
                <div class="card border-primary"> <!-- Agregamos la clase "border-primary" para establecer el color del borde -->
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['nombre'] ?></h5>
                        <p class="card-text">
                            <strong>Apellido:</strong> <?= $user['apellido'] ?><br>
                            <strong>Teléfono:</strong> <?= $user['telefono'] ?><br>
                            <strong>Correo:</strong> <?= $user['correo'] ?><br>
                            <strong>Usuario:</strong> <?= $user['usuario'] ?><br>
                            <strong>Contraseña:</strong> <?= $user['contraseña'] ?><br>
                            <strong>Rol:</strong> <?= $user['rol'] ?>
                        </p>
                        <div class="btn-group">
                            <button onclick="editUserModal(<?= $user['idUsuario'] ?>, '<?= $user['nombre'] ?>', '<?= $user['apellido'] ?>', '<?= $user['telefono'] ?>', '<?= $user['correo'] ?>', '<?= $user['usuario'] ?>','<?= $user['contraseña'] ?>', '<?= $user['rol'] ?>')" class="btn btn-primary">Editar</button>
                            <a href="<?= base_url('users/delete/' . $user['idUsuario']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
                        <h5 class="modal-title" id="searchModalLabel">Buscar Usuarios</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/users/search') ?>" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar usuarios">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal para agregar usuario -->
        <div id="addUserModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeAddUserModal()">&times;</span>
                <h2>Agregar Usuario</h2>
                <form id="addUserForm" action="<?= base_url('users/store') ?>" method="post">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <label for="addUserName">Nombre:</label><br>
                    <input type="text" id="addUserName" name="nombre" required><br>
                    <label for="addUserLastName">Apellido:</label><br>
                    <input type="text" id="addUserLastName" name="apellido" required><br>
                    <label for="addUserPhone">Teléfono:</label><br>
                    <input type="text" id="addUserPhone" name="telefono" required><br>
                    <label for="addUserEmail">Correo:</label><br>
                    <input type="email" id="addUserEmail" name="correo" required><br>
                    <label for="addUserUsername">Usuario:</label><br>
                    <input type="text" id="addUserUsername" name="usuario" required><br>
                    <label for="addUserPassword">Contraseña:</label><br>
                    <input type="text" id="addUserPassword" name="contraseña" required><br>
                    <label for="addUserRole">Rol:</label><br>
                    <select id="addUserRole" name="rol" required>
                        <option value="Estudiante">Estudiante</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Maestro">Maestro</option>
                    </select><br>
                    <input type="submit" value="Guardar Usuario" class="btn btn-success">
                </form>
            </div>
        </div>

        <!-- Modal para editar usuario -->
        <div id="editUserModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeEditUserModal()">&times;</span>
                <h2>Editar Usuario</h2>
                <form id="editUserForm" action="<?= base_url('users/update') ?>" method="post">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <input type="hidden" id="editUserId" name="idUsuario">
                    <label for="editUserName">Nombre:</label><br>
                    <input type="text" id="editUserName" name="nombre" required><br>
                    <label for="editUserLastName">Apellido:</label><br>
                    <input type="text" id="editUserLastName" name="apellido" required><br>
                    <label for="editUserPhone">Teléfono:</label><br>
                    <input type="text" id="editUserPhone" name="telefono" required><br>
                    <label for="editUserEmail">Correo:</label><br>
                    <input type="email" id="editUserEmail" name="correo" required><br>
                    <label for="editUserUsername">Usuario:</label><br>
                    <input type="text" id="editUserUsername" name="usuario" required><br>
                    <label for="editUserPassword">Contraseña:</label><br>
                    <input type="text" id="editUserPassword" name="contraseña" required><br>
                    <label for="editUserRole">Rol:</label><br>
                    <select id="editUserRole" name="rol" required>
                        <option value="Estudiante">Estudiante</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Maestro">Maestro</option>
                    </select><br>
                    <input type="submit" value="Guardar Cambios" class="btn btn-success">
                </form>
            </div>
        </div>

        <script>
            // Función para abrir el modal de agregar usuario
            function openAddUserModal() {
                document.getElementById('addUserModal').style.display = 'block';
            }

            // Función para cerrar el modal de agregar usuario
            function closeAddUserModal() {
                document.getElementById('addUserModal').style.display = 'none';
            }

            // Función para abrir el modal de edición de usuario
            function editUserModal(id, nombre, apellido, telefono, correo, usuario, contraseña, rol) {
                document.getElementById('editUserId').value = id;
                document.getElementById('editUserName').value = nombre;
                document.getElementById('editUserLastName').value = apellido;
                document.getElementById('editUserPhone').value = telefono;
                document.getElementById('editUserEmail').value = correo;
                document.getElementById('editUserUsername').value = usuario;
                document.getElementById('editUserPassword').value = contraseña;
                document.getElementById('editUserRole').value = rol;
                document.getElementById('editUserModal').style.display = 'block';
            }

            // Función para cerrar el modal de edición de usuario
            function closeEditUserModal() {
                document.getElementById('editUserModal').style.display = 'none';
            }
        </script>

        <script>
            window.addEventListener('resize', function() {
                // Aquí puedes realizar acciones cuando cambia el tamaño de la ventana
                // Por ejemplo, ajustar dimensiones de elementos o recargar la página
            });
        </script>
</body>

</html>