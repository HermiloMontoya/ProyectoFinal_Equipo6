<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #fffae7;">
    <div id="encabezado">
        <div id="menu"></div>
    </div>
    <br>

    <div class="container">
        <div class="row">

            <div class="col-3 bg-light">
            <h4>Menú</h4>
                <ul class="list-group">
                    <li class="list-group-item"><a href="index.php">Cerrar Sesión</a></li>
                    <li class="list-group-item"><a href="usuario.php">Cambiar a Modo Usuario</a></li>
                </ul>
            </div>

            <div class="col-9" style="background-color: #F5833E;">
                <div class="row">
                    <?php
                    $correo = $_POST['correo_usuario'];
                    $directorio = "img/";
                    if (isset($_POST['submit'])) {
                        // Obtener información del formulario
                        $nProductos = $_POST['nProducto'];
                        $precio = $_POST['precio'];
                        $descripcion = $_POST['descripcion'];
                        $fecha = $_POST['fecha'];

                        // Información del archivo
                        $file = $_FILES['image'];
                        $fileName = $file['name'];
                        $fileTmpName = $file['tmp_name'];
                        $fileSize = $file['size'];
                        $fileError = $file['error'];
                        $fileType = $file['type'];

                        // Extensiones permitidas
                        $allowed = array('jpg', 'jpeg', 'png', 'jfif');

                        if (in_array(pathinfo($fileName, PATHINFO_EXTENSION), $allowed)) {
                            if ($fileError === 0) {
                                if ($fileSize < 5000000) {
                                    // Nuevo nombre único para el archivo
                                    $fileNameNew = uniqid('', true) . "." . pathinfo($fileName, PATHINFO_EXTENSION);
                                    $fileDestination = $directorio . $fileNameNew;

                                    // Mover el archivo al directorio de imágenes
                                    move_uploaded_file($fileTmpName, $fileDestination);

                                    // Conexión a la base de datos
                                    $conn = new mysqli('localhost', 'root', 'root', 'delicias');

                                    // Verifica la conexión
                                    if ($conn->connect_error) {
                                        die("Conexión fallida: " . $conn->connect_error);
                                    }

                                    // Insertar datos en la base de datos
                                    $sql = "INSERT INTO productos (nombre_producto, precio_venta, descripcion, fecha, imagen, correo_usuario) 
                                        VALUES ('$nProductos', '$precio', '$descripcion', '$fecha', '$fileNameNew', '$correo')";
                                    if ($conn->query($sql) === true) {
                                        echo "Producto insertado correctamente.";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                    $conn->close();
                                } else {
                                    echo "El archivo es demasiado grande.";
                                }
                            } else {
                                echo "Error al subir el archivo.";
                            }
                        } else {
                            echo "No puedes subir archivos de este tipo.";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
