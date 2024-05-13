<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
    <img src="https://upn113leon.edu.mx/wp-content/uploads/2022/08/UPN-png.png" class="navbar-brand-img" width="80px" height="70px">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/inicio')?>">💻¡Bienvenido!🦉</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/users')?>">Usuarios 
                        <i class="fas fa-user"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/equipos')?>">Equipos 
                        <i class="fas fa-laptop"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/mobiliario')?>">Mobiliario
                        <i class="fas fa-chair"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/mantenimiento')?>">Mantenimiento 
                        <i class="fas fa-cog"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/proveedores')?>">Proveedores
                        <i class="fas fa-truck"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="confirmLogout()">Cerrar Sesión 
                        <i class="fas fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function confirmLogout() {
        if (confirm("¿Desea finalizar la sesión? 😢")) {
            alert("Ha cerrado sesión exitosamente. ¡Hasta pronto! 👋");
            window.location.href = "<?= base_url('/salir') ?>";
        } else {
            return false;
        }
    }
    
    // Función para adaptar la barra de navegación al cambio de tamaño de ventana
    window.addEventListener('resize', function() {
        var navbar = document.querySelector('.navbar-collapse');
        if (window.innerWidth < 992) {
            navbar.classList.add('show');
        } else {
            navbar.classList.remove('show');
        }
    });
</script>

</body>
</html>
