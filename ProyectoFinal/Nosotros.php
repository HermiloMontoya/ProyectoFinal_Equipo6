<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Nosotros</title>

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
        marquee {
            font-size: 22px;
            color: #ffffff;
        }
    </style>
</head>
<body >

    <div id="encabezado">
        <div id="menu">
            <ul>
                <li><a href="index.php" title="Página Principal">Inicio</a></li>
                <li><a href="Nosotros.php" >Nosotros</a></li>
                <li><a href="pasos.php" >Pasos</a></li>
                <li style="visibility: hidden;">...........................................................................................................................................................................................................</li>
                <li><a href="IniciarSesion.php">Iniciar sesion</a></li>
                <li><a href="Registrarse.php" >Registrarse</a></li>
            </ul>
        </div>
    </div>

    <div id="Texto">
    <marquee behavior="scroll" direction="left">¡Bienvenido a Delicias Coletas! Encuentra los mejores dulces típicos de San Cristóbal de las Casas.</marquee>
    <div class="container mt-5">
        
        <div class="jumbotron text-center">
            <h1 class="display-4">Sobre Nosotros</h1>
            <p class="lead">Descubre más sobre nuestra increíble empresa</p>
        </div>


        <div class="container mt-5">
            <div class="card">
                <img src="img/img1.jpg" class="card-img-top" alt="Misión">
                <div class="card-body">
                    <h5 class="card-title">Misión</h5>
                    <p class="card-text">Facilitar el acceso a los deliciosos dulces típicos de San Cristóbal a nivel local y estatal, proporcionando una plataforma web innovadora y gratuita, "Delicias Coletas", que conecta de manera efectiva a vendedores locales y revendedores. Nos comprometemos a impulsar las ventas por mayoreo, ofreciendo una solución eficiente para que los proveedores puedan exhibir sus productos y los clientes puedan realizar compras anticipadas, promoviendo así la rica tradición de sabores y texturas de los dulces típicos.</p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="card">
                <img src="img/img2.jpg" class="card-img-top" alt="Visión">
                <div class="card-body">
                    <h5 class="card-title">Visión</h5>
                    <p class="card-text">Convertirnos en la principal plataforma digital de referencia para la compra y venta de dulces típicos de San Cristóbal, destacando por nuestra innovación tecnológica y compromiso con la comunidad. Buscamos ser reconocidos como el puente que une a vendedores locales con revendedores y clientes, creando una red sólida que promueva el crecimiento económico de ambos segmentos y la apreciación de la cultura gastronómica de la región.</p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Valores</h5>
                    <p class="card-text">
                        <b>Colaboración:</b> Fomentamos la cooperación entre vendedores y revendedores, creando una red de apoyo que beneficie a ambas partes y fortalezca la comunidad.<br>
                        <b>Integridad:</b> Actuamos con honestidad y transparencia en todas nuestras operaciones, construyendo confianza tanto con proveedores como con clientes.<br>
                        <b>Innovación:</b> Buscamos constantemente maneras creativas de mejorar nuestra plataforma, aprovechando la tecnología para ofrecer soluciones eficientes y accesibles.<br>
                        <b>Compromiso comunitario:</b> Nos comprometemos a contribuir al crecimiento económico de los vendedores locales y a brindar oportunidades para que los revendedores prosperen.<br>
                        <b>Satisfacción del cliente:</b> Priorizamos la experiencia del cliente, asegurando una comunicación efectiva y facilitando un proceso de compra sin complicaciones.
                    </p>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
    </html>
