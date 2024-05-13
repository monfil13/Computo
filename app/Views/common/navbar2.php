<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style2.css">
    <style>
        .navbar-custom {
            display: flex;
            justify-content: space-between;
            align-items: center; /* Alinea verticalmente los elementos del navbar */
        }

        .navbar-left,
        .navbar-right {
            display: flex;
            align-items: center;
        }

        .navbar-right {
            margin-left: auto; /* Mueve el contenido a la derecha */
        }

        .nav-item {
            margin-left: 10px; /* Espacio entre elementos de la lista */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-custom">
    <div class="container-fluid">
        <div class="navbar-left">
            <img src="https://upn113leon.edu.mx/wp-content/uploads/2022/08/UPN-png.png" class="navbar-brand-img" width="80px" height="70px">
            <a class="navbar-brand welcome-section">💻¡Bienvenido!🦉</a>
        </div>
        <div class="navbar-right">
            <ul class="navbar-nav">
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
