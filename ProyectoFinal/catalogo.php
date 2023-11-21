<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', 'root', 'delicias');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado una solicitud para eliminar un producto
if (isset($_GET['eliminar_producto'])) {
    $id_producto = $_GET['eliminar_producto'];

    // Eliminar el producto de la base de datos
    $eliminarProducto = $conn->prepare("DELETE FROM productos WHERE id = ?");
    $eliminarProducto->bind_param('i', $id_producto);
    $eliminarProducto->execute();

    // Redirigir a la página después de la eliminación
    header('Location: catalogo.php');
    exit();
}

// Obtener datos de la base de datos
$result = $conn->query("SELECT * FROM productos");

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
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
            <li><a href="modoAdministrador.php" title="informacion">Inicio SuperUsuario</a></li>
                <li><a href="normas.php" title="Normas">Normas</a></li>
                <li><a href="catalogo.php" >Administrar Publicaciones</a></li>
                <li><a href="catalago2.php" >Administrar Usuarios</a></li>
                </li><li style="visibility: hidden;">...................................................................................................................</li>
                    <li> <form action="buscar_productos2.php" method="GET" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 custom-search-input" type="search" placeholder="Buscar producto" aria-label="Search" name="q">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                    <li><a href="index.php" >Cerrar Sesion</a></li> 
        </ul>

        </div>
    </div>
    <br><br><br>

    <div class="container">
        <div class="row">
            <?php
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
                            <a href='#' class='btn btn-danger eliminar-btn' data-id='" . $row['id'] . "'>Eliminar</a>
                            <a href='editarProducto.php?id=" . $row['id'] . "' class='btn btn-primary'>Editar</a>
                        </div>
                        </div>
                    </div>";
                }
            } else {
                echo "No se encontraron resultados en la base de datos.";
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.eliminar-btn').click(function() {
                var idProducto = $(this).data('id');
                if (confirmarEliminar()) {
                    window.location.href = 'catalogo.php?eliminar_producto=' + idProducto;
                }
            });

            function confirmarEliminar() {
                return confirm("¿Estás seguro de que quieres eliminar este producto?");
            }
        });
    </script>
</body>
</html>
