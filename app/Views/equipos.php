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
        <button onclick="openAddEquipoModal()" class="btn btn-primary">Agregar Equipo</button>
        <a href="inicio" class="btn btn-success">Volver al menú</a>
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
                        <div class="btn-group">
                            <button onclick="editEquipoModal(<?= $equipo['idEquipo'] ?>, '<?= $equipo['nombre'] ?>', '<?= $equipo['marca'] ?>', '<?= $equipo['modelo'] ?>', '<?= $equipo['descripcion'] ?>', '<?= $equipo['tipo'] ?>', '<?= $equipo['estado'] ?>')" class="btn btn-primary">Editar</button>
                            <a href="<?= base_url('equipos/delete/' . $equipo['idEquipo']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este equipo?')">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

    <!-- Modal para agregar equipo -->
    <div id="addEquipoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddEquipoModal()">&times;</span>
            <h2>Agregar Equipo</h2>
            <form id="addEquipoForm" action="<?= base_url('equipos/store') ?>" method="post">
                <label for="addEquipoNombre">Nombre:</label><br>
                <input type="text" id="addEquipoNombre" name="nombre" required><br>
                <label for="addEquipoMarca">Marca:</label><br>
                <input type="text" id="addEquipoMarca" name="marca" required><br>
                <label for="addEquipoModelo">Modelo:</label><br>
                <input type="text" id="addEquipoModelo" name="modelo" required><br>
                <label for="addEquipoDescripcion">Descripción:</label><br>
                <textarea id="addEquipoDescripcion" name="descripcion" required></textarea><br>
                <label for="addEquipoTipo">Tipo:</label><br>
                <select id="addEquipoTipo" name="tipo" required>
                    <option value="Computadora">Computadora</option>
                    <option value="Impresora">Impresora</option>
                    <option value="Fotocopiadora">Fotocopiadora</option>
                    <option value="Television">Television</option>
                </select><br>
                <label for="addEquipoEstado">Estado:</label><br>
                <select id="addEquipoEstado" name="estado" required>
                    <option value="Disponible">Disponible</option>
                    <option value="En reparacion">En reparacion</option>
                    <option value="Dañado">Dañado</option>
                </select><br>
                <input type="submit" value="Guardar Equipo" class="btn btn-success">
            </form>
        </div>
    </div>

    <!-- Modal para editar equipo -->
    <div id="editEquipoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditEquipoModal()">&times;</span>
            <h2>Editar Equipo</h2>
            <form id="editEquipoForm" action="<?= base_url('equipos/update') ?>" method="post">
                <input type="hidden" id="editEquipoId" name="idEquipo">
                <label for="editEquipoNombre">Nombre:</label><br>
                <input type="text" id="editEquipoNombre" name="nombre" required><br>
                <label for="editEquipoMarca">Marca:</label><br>
                <input type="text" id="editEquipoMarca" name="marca" required><br>
                <label for="editEquipoModelo">Modelo:</label><br>
                <input type="text" id="editEquipoModelo" name="modelo" required><br>
                <label for="editEquipoDescripcion">Descripción:</label><br>
                <textarea id="editEquipoDescripcion" name="descripcion" required></textarea><br>
                <label for="editEquipoTipo">Tipo:</label><br>
                <select id="editEquipoTipo" name="tipo" required>
                    <option value="Computadora">Computadora</option>
                    <option value="Impresora">Impresora</option>
                    <option value="Fotocopiadora">Fotocopiadora</option>
                    <option value="Television">Television</option>
                </select><br>
                <label for="editEquipoEstado">Estado:</label><br>
                <select id="editEquipoEstado" name="estado" required>
                    <option value="Disponible">Disponible</option>
                    <option value="En reparacion">En reparacion</option>
                    <option value="Dañado">Dañado</option>
                </select><br>
                <input type="submit" value="Guardar Cambios" class="btn btn-success">
            </form>
        </div>
    </div>

    <script>
        // Función para abrir el modal de agregar equipo
        function openAddEquipoModal() {
            document.getElementById('addEquipoModal').style.display = 'block';
        }

        // Función para cerrar el modal de agregar equipo
        function closeAddEquipoModal() {
            document.getElementById('addEquipoModal').style.display = 'none';
        }

        // Función para abrir el modal de edición de equipo
        function editEquipoModal(id, nombre, marca, modelo, descripcion, tipo, estado) {
            document.getElementById('editEquipoId').value = id;
            document.getElementById('editEquipoNombre').value = nombre;
            document.getElementById('editEquipoMarca').value = marca;
            document.getElementById('editEquipoModelo').value = modelo;
            document.getElementById('editEquipoDescripcion').value = descripcion;
            document.getElementById('editEquipoTipo').value = tipo;
            document.getElementById('editEquipoEstado').value = estado;
            document.getElementById('editEquipoModal').style.display = 'block';
        }

        // Función para cerrar el modal de edición de equipo
        function closeEditEquipoModal() {
            document.getElementById('editEquipoModal').style.display = 'none';
        }
    </script>
</body>
</html>
