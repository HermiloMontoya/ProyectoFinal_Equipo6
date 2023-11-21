<?php
session_start();

if (isset($_SESSION['correo'])) {
    $correo = $_SESSION['correo'];

    // Crear conexión a la base de datos
    $conn = new mysqli('localhost', 'root', 'root', 'delicias');

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consultar la base de datos para obtener el nombre y apellido
    $consultaUsuario = $conn->prepare("SELECT nombreUsuario, aPaterno FROM t_usuarios WHERE correo = ?");
    $consultaUsuario->bind_param('s', $correo);
    $consultaUsuario->execute();

    $resultado = $consultaUsuario->get_result();
    $usuario = $resultado->fetch_assoc();

    // Mostrar el saludo con el nombre y apellido
    $saludo = $usuario['nombreUsuario'] . " " . $usuario['aPaterno'];
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Inicio SuperUsuario</title>

    <style>
        body {
            background: url('img/img1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
        }
        #Texto {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
        .card {
            margin-top: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #ffffff;
        }
    </style>
</head>
<body >

    <div id="encabezado">
        <div id="menu">
            <ul>
            <li><a href="modoAdministrador.php" title="informacion">Inicio SuperUsuario</a></li>
                <li><a href="normas.php" title="Normas">Normas</a></li>
                <li><a href="catalogo.php" >Administrar Publicaciones</a></li>
                <li><a href="catalago2.php" >Administrar Usuarios</a></li>
                <li style="visibility: hidden;">..........................................................................................................................................................................................................</li>
                <li><a href="index.php" >Cerrar Sesion</a></li> 
            </ul>
        </div>
    </div>

    <div id="Texto">
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">¡¡¡ <?php echo $saludo; ?> !!!</h1>
            <h2>Bienvenido al modo Super Usuario o Administrador</h2>
            <p class="lead">Ahora que eres parte de nuestra comunidad, 
            tendras acceso a poder editar o eliminar publicaciones que no cumplan con nuestras normas o usuarios que las infrijan.</p>
        </div>


        <div class="container mt-5">
            <div class="card">
                <img src="img/img8.jpeg" class="card-img-top" alt="Misión">
                <div class="card-body">
                    <h5 class="card-title">...</h5>
                    <p class="card-text">¡Enhorabuena y felicitaciones por convertirte en un Superusuario de nuestra comunidad! Tu dedicación y participación es dumamente importante. Ahora, con el poder de contribuir aún más al bienestar de nuestra plataforma, confiamos plenamente en tu capacidad para mantener un ambiente positivo y cumplir con las normas establecidas. Tu compromiso no solo fortalece nuestra comunidad, sino que también marca la diferencia. ¡Gracias por ser una parte tan valiosa de nuestro equipo! Estamos emocionados por todo lo que lograrás en esta nueva capacidad. ¡Bienvenido al selecto grupo de Superusuarios! 🚀✨
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
    </html>

            