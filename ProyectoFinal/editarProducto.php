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
                <li style="visibility: hidden;">.....................................................................................................................................................................................................................................................</li>
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

            // Obtener la información del producto
            $result = $conn->query("SELECT * FROM productos WHERE id = $id");

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <h2>Editar Producto</h2>
                <form action="actualizarProducto.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombreProducto">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="<?php echo $row['nombre_producto']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="precioVenta">Precio de Venta</label>
                        <input type="text" class="form-control" id="precioVenta" name="precioVenta" value="<?php echo $row['precio_venta']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $row['descripcion']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $row['fecha']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="imagen">Actualizar Imagen</label>
                        <input type="file" name="imagen" class="form-control-file" id="imagen">
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    
                </form>
                <?php
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
