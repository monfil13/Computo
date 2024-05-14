<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('public/style2.css') ?>">

    <style>
body {
    color: white;
    font-family: Tahoma, sans-serif;
    background-color: rgb(255, 255, 255);
}

.section {
    margin: 2vw auto; /* Centra la sección y agrega margen vertical */
    max-width: 80%; /* Establece un ancho máximo para la sección */
}


th,
td {
    border: 1px solid white;
    padding: 1.5vw; /* Utiliza 1.5% del ancho de la ventana como relleno */
    text-align: center; /* Centra el texto horizontalmente */
    font-size: 1.5vw; /* Utiliza 1.5% del ancho de la ventana para el tamaño de fuente */
}

button {
    background-color: #007bff; /* Azul fuerte */
    color: white; /* Letras blancas */
    border: none;
    border-radius: 5px; /* Curvatura de los bordes */
    padding: 8px 16px; /* Tamaño similar a otros botones */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px; /* Tamaño de fuente fijo */
    margin: 10px 5px; /* Margen similar a otros botones */
    cursor: pointer;
    transition: none; /* Elimina la transición */
    position: relative;
}

.navbar-custom {
background-color: #2728C0; /* Nuevo color de fondo */
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.8);
}

.modal-content {
    background-color: white;
    margin: 5vh auto; /* Utiliza 5% de la altura de la ventana como margen vertical */
    padding: 2vw; /* Utiliza 2% del ancho de la ventana como relleno */
    border: 1px solid #000000;
    width: 90vw; /* Utiliza el 90% del ancho de la ventana */
    border-radius: 3vw; /* Utiliza el 3% del ancho de la ventana como radio de borde */
    color: #000000;
    box-shadow: 0 0 1vw rgba(0, 0, 0, 0.5); /* Utiliza 1% del ancho de la ventana para la sombra */
}

.modal button {
    padding: 0; /* Elimina el padding específico */
    width: 150px; /* Establece un ancho fijo para los botones */
}

.navbar-nav .nav-item .nav-link {
    color: #ffffff;
    transition: background-color 0.3s, color 0.3s;
}

.navbar-nav .nav-item:hover .nav-link {
    background-color: #ffffff;
    color: #000000;
}

.navbar-brand-img {
    overflow: hidden;
}

.navbar-custom {
    display: flex;
    justify-content: space-between;
}

.navbar-left,
.navbar-right {
    display: flex;
    align-items: center;
}

.navbar-right {
    margin-left: auto;
}

.navbar-center {
    flex-grow: 1;
    display: flex;
    justify-content: center;
}

.navbar-brand.welcome-section {
    color: white;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.card {
    width: 300px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 20px;
}

.card-title {
    margin-bottom: 10px;
}

.btn-group {
    margin-top: 20px;
    text-align: center;
}


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
            <a class="navbar-brand welcome-section">💻 ¡Bienvenido, <?= session('usuario') ?>! 🦉</a>
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
    function adaptNavbar() {
        var navbar = document.querySelector('.navbar-collapse');
        if (window.innerWidth < 992) {
            navbar.classList.add('show');
        } else {
            navbar.classList.remove('show');
        }
    }
    
    // Llama a la función adaptNavbar cuando se carga la página y cuando se cambia el tamaño de la ventana
    window.addEventListener('load', adaptNavbar);
    window.addEventListener('resize', adaptNavbar);
</script>


</body>
</html>
