<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Publicaciones</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .card {
            max-width: 400px;
            margin-bottom: 50px;
        }
        .card img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
            max-height: 250px;
        }
        .card-body {
            height: 300px;
            overflow: auto;
        }
        .custom-search-input {
            width: 300px;
        }
    </style>
</head>

<body>
    <div id="encabezado">
        <div id="menu">
            <ul>
                <li class="list-group-item"><a href="index.php">Cerrar Sesión</a></li>
                <li class="list-group-item"><a href="usuario.php">Regresar</a></li>
                <li class="list-group-item"><a href="proveedor.php">Cambiar a Modo proveedor</a></li>
                <li class="list-group-item"><a href="misPublicaciones.php">Mis publicaciones</a></li>
                <li style="visibility: hidden;">.........................................................................................................................................................</li>
                <li class="list-group-item">
                    <form action="buscar_productos.php" method="GET" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 custom-search-input" type="search" placeholder="Buscar producto" aria-label="Search" name="q">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <br><br><br>

    <div class="container">
        <div class="row">
            <?php

            // Conexión a la base de datos
            $conn = new mysqli('localhost', 'root', 'root', 'delicias');

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }
            // Obtener datos de la base de datos
            session_start();
            if (isset($_SESSION['correo'])) {
                $correo_usuario = $_SESSION['correo'];
                $result = $conn->query("SELECT * FROM productos WHERE correo_usuario = '$correo_usuario'");
            } else {
                echo "No se ha iniciado sesión.";
                exit();
            }

            // Obtener el nombre del usuario para el saludo
            $consultaUsuario = $conn->query("SELECT nombreUsuario, aPaterno FROM t_usuarios WHERE correo = '$correo_usuario'");
            $usuario = $consultaUsuario->fetch_assoc();
            $saludo = "Hola, " . $usuario['nombreUsuario'] . " " . $usuario['aPaterno'] . ". Aquí están tus publicaciones:";

            echo "<h3 class='mb-4'>$saludo</h3>";

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4'>
                        <div class='card mb-3'>
                            <img src='img/" . $row["imagen"] . "' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $row["nombre_producto"] . "</h5>
                                <p class='card-text'><strong>Precio de Venta: </strong>" . $row["precio_venta"] . "</p>
                                <p class='card-text'><em>Descripción: </em>" . $row["descripcion"] . "</p>
                                <p class='card-text'><strong>Fecha: </strong>" . $row["fecha"] . "</p>
                                <p class='card-text'><strong>Correo del Usuario: </strong>" . $row["correo_usuario"] . "</p>
                                <a href='eliminar_producto.php?id=" . $row['id'] . "' class='btn btn-danger'>Eliminar</a>
                                <a href='editar_producto.php?id=" . $row['id'] . "' class='btn btn-primary'>Editar</a>
                                
                            </div>
                        </div>
                        
                    </div>";
                    
                    
                }
            } else {
                echo "No se encontraron publicaciones para este usuario.";
            }
            $conn->close();
            ?>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
