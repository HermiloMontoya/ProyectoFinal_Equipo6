<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .custom-search-input {
            width: 300px;
        }
    </style>
</head>
<body>
<div id="encabezado">
        <div id="menu">
            <ul>
            <li><a href="modoAdministrador.php" title="informacion">Inicio SuperUsuario</a></li>
                <li><a href="normas.php" title="Normas">Normas</a></li>
                <li><a href="catalogo.php" >Regresar</a></li>
                <li style="visibility: hidden;">......................................................................................................................................................................................................................</li>
                <li><a href="index.php" >Cerrar Sesion</a></li> 
            </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        
<?php
// Verificar si se ha proporcionado un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', 'root', 'delicias');

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener la información actual del producto
    $result = $conn->query("SELECT * FROM productos WHERE id = $id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Obtener los datos actualizados del formulario
        $nombreProducto = $_POST['nombreProducto'];
        $precioVenta = $_POST['precioVenta'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];

        // Verificar si se proporcionó una nueva imagen
        if ($_FILES['imagen']['size'] > 0) {
            $imagen = $_FILES['imagen']['name'];
            $rutaImagen = "img/" . $imagen;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);
        } else {
            // Mantener la imagen existente
            $imagen = $row['imagen'];
        }

        // Actualizar el producto en la base de datos
        $actualizarProducto = $conn->prepare("UPDATE productos SET nombre_producto = ?, precio_venta = ?, descripcion = ?, fecha = ?, imagen = ? WHERE id = ?");
        $actualizarProducto->bind_param("sssssi", $nombreProducto, $precioVenta, $descripcion, $fecha, $imagen, $id);
        $actualizarProducto->execute();

        // Verificar si se actualizó correctamente
        if ($actualizarProducto->affected_rows > 0) {
            echo "Producto actualizado correctamente.";
        } else {
            echo "Error al actualizar el producto.";
        }

        $actualizarProducto->close();
    } else {
        echo "Producto no encontrado.";
    }

    $conn->close();
} else {
    echo "ID de producto no válido.";
}
?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
