<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="section" align="center">
    <h2>Mantenimiento</h2>
        <button onclick="openAddMantenimientoModal()" class="btn btn-primary">Agregar Mantenimiento</button>
        <a href="inicio" class="btn btn-success">Volver al menú</a>
        <h2> </h2> <!-- Añadí este espacio para mantener el espacio entre el título y las tarjetas -->
        <!-- Contenedor para las tarjetas de mantenimiento -->
        <div class="card-container">
            <?php foreach ($mantenimiento as $item): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['nombreEquipo'] ?></h5>
                        <p class="card-text">
                            <strong>Tipo:</strong> <?= $item['tipo'] ?><br>
                            <strong>Fecha de Mantenimiento:</strong> <?= $item['fechaMantenimiento'] ?><br>
                            <strong>Fecha de Salida:</strong> <?= $item['fechaSalida'] ?><br>
                            <strong>Fecha de Ingreso:</strong> <?= $item['fechaIngreso'] ?><br>
                            <strong>Descripción:</strong> <?= $item['descripcion'] ?>
                        </p>
                        <div class="btn-group">
                            <button onclick="editMantenimientoModal(<?= $item['idMantenimiento'] ?>, <?= $item['idEquipo'] ?>, '<?= $item['tipo'] ?>', '<?= $item['fechaMantenimiento'] ?>', '<?= $item['fechaSalida'] ?>', '<?= $item['fechaIngreso'] ?>', '<?= $item['descripcion'] ?>')" class="btn btn-primary">Editar</button>
                            <a href="<?= base_url('mantenimiento/delete/' . $item['idMantenimiento']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este mantenimiento?')">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>


    <!-- Modal para agregar mantenimiento -->
    <div id="addMantenimientoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddMantenimientoModal()">&times;</span>
            <h2>Agregar Mantenimiento</h2>
            <form id="addMantenimientoForm" action="<?= base_url('mantenimiento/store') ?>" method="post">
                <label for="addMantenimientoEquipo">Equipo:</label><br>
                <select id="addMantenimientoEquipo" name="idEquipo" required>
                    <?php foreach ($equipos as $equipo): ?>
                        <option value="<?= $equipo['idEquipo'] ?>"><?= $equipo['nombre'] ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label for="addMantenimientoTipo">Tipo:</label><br>
                <select id="addMantenimientoTipo" name="tipo" required>
                    <option value="Equipo">Equipo</option>
                    <option value="Dispositivo">Dispositivo</option>
                    <option value="Mobiliario">Mobiliario</option>
                </select><br>
                <label for="addMantenimientoFechaMantenimiento">Fecha de Mantenimiento:</label><br>
                <input type="date" id="addMantenimientoFechaMantenimiento" name="fechaMantenimiento" required><br>
                <label for="addMantenimientoFechaSalida">Fecha de Salida:</label><br>
                <input type="date" id="addMantenimientoFechaSalida" name="fechaSalida" required><br>
                <label for="addMantenimientoFechaIngreso">Fecha de Ingreso:</label><br>
                <input type="date" id="addMantenimientoFechaIngreso" name="fechaIngreso" required><br>
                <label for="addMantenimientoDescripcion">Descripción:</label><br>
                <textarea id="addMantenimientoDescripcion" name="descripcion" required></textarea><br>
                <input type="submit" value="Guardar Mantenimiento" class="btn btn-success">
            </form>
        </div>
    </div>

    <!-- Modal para editar mantenimiento -->
    <div id="editMantenimientoModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditMantenimientoModal()">&times;</span>
            <h2>Editar Mantenimiento</h2>
            <form id="editMantenimientoForm" action="<?= base_url('mantenimiento/update') ?>" method="post">
                <input type="hidden" id="editMantenimientoId" name="idMantenimiento">
                <label for="editMantenimientoEquipo">Equipo:</label><br>
                <select id="editMantenimientoEquipo" name="idEquipo" required>
                    <?php foreach ($equipos as $equipo): ?>
                        <option value="<?= $equipo['idEquipo'] ?>"><?= $equipo['nombre'] ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label for="editMantenimientoTipo">Tipo:</label><br>
                <select id="editMantenimientoTipo" name="tipo" required>
                    <option value="Equipo">Equipo</option>
                    <option value="Dispositivo">Dispositivo</option>
                    <option value="Mobiliario">Mobiliario</option>
                </select><br>
                <label for="editMantenimientoFechaMantenimiento">Fecha de Mantenimiento:</label><br>
                <input type="date" id="editMantenimientoFechaMantenimiento" name="fechaMantenimiento" required><br>
                <label for="editMantenimientoFechaSalida">Fecha de Salida:</label><br>
                <input type="date" id="editMantenimientoFechaSalida" name="fechaSalida" required><br>
                <label for="editMantenimientoFechaIngreso">Fecha de Ingreso:</label><br>
                <input type="date" id="editMantenimientoFechaIngreso" name="fechaIngreso" required><br>
                <label for="editMantenimientoDescripcion">Descripción:</label><br>
                <textarea id="editMantenimientoDescripcion" name="descripcion" required></textarea><br>
                <input type="submit" value="Guardar Cambios" class="btn btn-success">
            </form>
        </div>
    </div>

    <script>
        // Función para abrir el modal de agregar mantenimiento
        function openAddMantenimientoModal() {
            document.getElementById('addMantenimientoModal').style.display = 'block';
        }

        // Función para cerrar el modal de agregar mantenimiento
        function closeAddMantenimientoModal() {
            document.getElementById('addMantenimientoModal').style.display = 'none';
        }

        // Función para abrir el modal de edición de mantenimiento
        function editMantenimientoModal(id, idEquipo, tipo, fechaMantenimiento, fechaSalida, fechaIngreso, descripcion) {
            document.getElementById('editMantenimientoId').value = id;
            document.getElementById('editMantenimientoEquipo').value = idEquipo;
            document.getElementById('editMantenimientoTipo').value = tipo;
            document.getElementById('editMantenimientoFechaMantenimiento').value = fechaMantenimiento;
            document.getElementById('editMantenimientoFechaSalida').value = fechaSalida;
            document.getElementById('editMantenimientoFechaIngreso').value = fechaIngreso;
            document.getElementById('editMantenimientoDescripcion').value = descripcion;
            document.getElementById('editMantenimientoModal').style.display = 'block';
        }

        // Función para cerrar el modal de edición de mantenimiento
        function closeEditMantenimientoModal() {
            document.getElementById('editMantenimientoModal').style.display = 'none';
        }
    </script>
</body>
</html>
