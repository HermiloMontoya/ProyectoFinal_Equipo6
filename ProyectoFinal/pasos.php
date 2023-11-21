<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Delicias Coletas</title>
    <style>
        body {
            background: url('img/img4.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff; /* color del texto */
        }
        #Texto {
            background-color: rgba(0, 0, 0, 0.7); /* fondo transparente para resaltar el texto */
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
        marquee {
            font-size: 22px;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <div id="encabezado">
        <div id="menu">
            <ul>
                <li><a href="index.php" title="Página Principal">Inicio</a></li>
                <li><a href="Nosotros.php" >Nosotros</a></li>
                <li><a href="pasos.php" >Pasos</a></li>
                <li style="visibility: hidden;">...........................................................................................................................................................................................................</li>

                <li><a href="IniciarSesion.php">Iniciar sesión</a></li>
                <li><a href="Registrarse.php" >Registrarse</a></li>
            </ul>
        </div>
    </div>

    <div id="Texto">
<marquee behavior="scroll" direction="left">¡Bienvenido a Delicias Coletas! Encuentra los mejores dulces típicos de San Cristóbal de las Casas.</marquee>

    <div class="container">
    <h2>¿Como funciona nuestra pagina web?</h2>
    <h1 style="font-size: 19px;"> Nuestra pagina esta diseñada con la finalidad de que sea intuitiva y amigable para el usuario.</h1>


        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/img12.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/img13.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/img14.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </body>
</html>
