<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="section" align="center">
        <h2>Mantenimiento</h2>
        <button onclick="openAddMantenimientoModal()" class="btn btn-info">Agregar Mantenimiento</button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#searchModal">Buscar</button>
        <a href="<?= base_url('admin/inicio') ?>" class="btn btn-success">Volver al menú</a>
<!-- <button onclick="generarReportePDF()" class="btn btn-primary">Generar Reporte PDF</button> -->

<script>
    // Función para generar el reporte PDF
    function generarReportePDF() {
        // Redirecciona a la ruta que generará el reporte PDF
        window.location.href = "<?= base_url('admin/mantenimiento/generarReportePDF') ?>";
    }
</script>

        <h2> </h2>
        <div class="container">
    <table class="table table-bordered custom-border">
        <thead>
            <tr>
                <th>Equipo</th>
                <th>Tipo</th>
                <th>Fecha de Mantenimiento</th>
                <th>Fecha de Salida</th>
                <th>Fecha de Ingreso</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mantenimiento as $item) : ?>
                <tr>
                    <td><?= $item['nombreEquipo'] ?></td>
                    <td><?= $item['tipo'] ?></td>
                    <td><?= $item['fechaMantenimiento'] ?></td>
                    <td><?= $item['fechaSalida'] ?></td>
                    <td><?= $item['fechaIngreso'] ?></td>
                    <td><?= $item['descripcion'] ?></td>
                    <td>
                        <button onclick="editMantenimientoModal(<?= $item['idMantenimiento'] ?>, <?= $item['idEquipo'] ?>, '<?= $item['tipo'] ?>', '<?= $item['fechaMantenimiento'] ?>', '<?= $item['fechaSalida'] ?>', '<?= $item['fechaIngreso'] ?>', '<?= $item['descripcion'] ?>')" class="btn btn-primary">Editar</button>
                        <a href="<?= base_url('admin/mantenimiento/delete/' . $item['idMantenimiento']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este mantenimiento?')">Eliminar</a>
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
                    <h5 class="modal-title" id="searchModalLabel">Buscar Mantenimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/mantenimiento/search') ?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar mantenimiento">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>


<!-- Modal para agregar mantenimiento -->
<div id="addMantenimientoModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAddMantenimientoModal()">&times;</span>
        <h2>Agregar Mantenimiento</h2>
        <form id="addMantenimientoForm" action="<?= base_url('admin/mantenimiento/store') ?>" method="post">
            <label for="addMantenimientoEquipo">Equipo:</label><br>
            <select id="addMantenimientoEquipo" name="idEquipo" required>
                <?php foreach ($equipos as $equipo) : ?>
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
        <form id="editMantenimientoForm" action="<?= base_url('admin/mantenimiento/update') ?>" method="post">
            <input type="hidden" id="editMantenimientoId" name="idMantenimiento">
            <label for="editMantenimientoEquipo">Equipo:</label><br>
            <select id="editMantenimientoEquipo" name="idEquipo" required>
                <?php foreach ($equipos as $equipo) : ?>
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