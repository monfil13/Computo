<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Mantenimiento</title>
</head>
<body>
    <h1>Reporte de Mantenimiento</h1>
    <img src="<?= base_url('upn.jpg') ?>" style="width: 100px; height: 100px;">
    <p>Fecha: <?= date('Y-m-d') ?></p>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Equipo</th>
                <th>Tipo</th>
                <th>Fecha de Mantenimiento</th>
                <th>Fecha de Salida</th>
                <th>Fecha de Ingreso</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mantenimiento as $mant) : ?>
                <tr>
                    <td><?= $mant['idMantenimiento'] ?></td>
                    <td><?= $mant['idEquipo'] ?></td>
                    <td><?= $mant['tipo'] ?></td>
                    <td><?= $mant['fechaMantenimiento'] ?></td>
                    <td><?= $mant['fechaSalida'] ?></td>
                    <td><?= $mant['fechaIngreso'] ?></td>
                    <td><?= $mant['descripcion'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
