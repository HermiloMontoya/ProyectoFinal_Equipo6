<?php
session_start();
require("modelo/conexionPDO.php");

// Verificar si la sesión está iniciada
if (isset($_SESSION['correo'])) {
    $correo = $_SESSION['correo'];

    // Consultar la base de datos para obtener el nombre y apellido
    $consultaUsuario = $conn->prepare("SELECT nombreUsuario, aPaterno FROM t_usuarios WHERE correo = :correo");
    $consultaUsuario->bindParam(':correo', $correo);
    $consultaUsuario->execute();

    $usuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

    // Mostrar el saludo con el nombre y apellido
    $saludo = "Hola, " . $usuario['nombreUsuario'] . " " . $usuario['aPaterno'] . ". Has ingresado como modo Proveedor.";

    // Procesar el formulario para publicar un nuevo producto
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        try {
            // Obtener la información del formulario
            $nombreProducto = $_POST['nProducto'];
            $precioVenta = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $fecha = $_POST['fecha'];

            // Obtener el nombre del archivo de imagen y moverlo al directorio de imágenes
            $imagen = $_FILES['image']['name'];
            $rutaImagen = "img/" . $imagen;
            move_uploaded_file($_FILES['image']['tmp_name'], $rutaImagen);

            // Insertar el nuevo producto en la base de datos
            $insertarProducto = $conn->prepare("INSERT INTO productos (nombre_producto, precio_venta, descripcion, fecha, imagen, correo_usuario, nombre_usuario) VALUES (:nombre, :precio, :descripcion, :fecha, :imagen, :correo, :nombreUsuario)");
            $insertarProducto->bindParam(':nombre', $nombreProducto);
            $insertarProducto->bindParam(':precio', $precioVenta);
            $insertarProducto->bindParam(':descripcion', $descripcion);
            $insertarProducto->bindParam(':fecha', $fecha);
            $insertarProducto->bindParam(':imagen', $imagen);
            $insertarProducto->bindParam(':correo', $correo);
            $insertarProducto->bindParam(':nombreUsuario', $usuario['nombreUsuario']);

            // Ejecutar la consulta
            $insertarProducto->execute();
            
            echo "Producto insertado correctamente.";

        } catch (Exception $e) {
            echo "Error al insertar el producto: " . $e->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modo Proveedor</title>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>

        marquee {
            font-size: 30px;
            color: #000000;
        }
        .custom-card {
            background-color: #000000;
        }
        body {
            background: url('') no-repeat center center fixed;
            background-size: cover;
            color: #000000; /* color del texto */
        }

    </style>
</head>

<body>

    <div id="encabezado">
        <div id="menu"></div>
    </div> <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 bg-light" color="blue">
                <h4>Menú</h4>
                <ul class="list-group">
                    <li class="list-group-item"><a href="index.php">Cerrar Sesión</a></li>
                    <li class="list-group-item"><a href="usuario.php">Cambiar a Modo Usuario</a></li>
                    <li class="list-group-item"><a href="misPublicaciones.php">Mis publicaciones</a></li>
                </ul>
            </div>
            <div class="col-9">
                <h2><?php echo $saludo; ?></h2>
                <div class="card mt-3">
                    <div class="card" Color= blue>
                        <Div class="card-body ">
                        <h5 >Desea publicar algo nuevo?</h5></Div>

                        <form action="subirimagen.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="productName" type="text-left">Nombre del Producto</label>
                                <input type="text" class="form-control" id="productName" name="nProducto"
                                    placeholder="Ingrese el nombre del producto">
                            </div>

                            <div class="form-group">
                                <label for="price">Precio de Venta</label>
                                <input type="text" class="form-control" id="price" name="precio"
                                    placeholder="Ingrese el precio de venta">
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" id="description" name="descripcion" rows="3"
                                    placeholder="Ingrese la descripción"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input type="date" class="form-control" id="date" name="fecha">
                            </div>
                            <div class="form-group">
                                <label for="image">Subir Imagen</label>
                                <input type="file" name="image" class="form-control-file" id="imagen">
                            </div>

                            <!-- Agrega un campo oculto para almacenar el correo del usuario -->
                            <input type="hidden" name="correo_usuario" value="<?php echo $correo; ?>">

                            <button type="submit" name="submit" class="col-3 bg-light">Publicar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
