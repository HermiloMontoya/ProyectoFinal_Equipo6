
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .card {
        width: 100%;
        margin-bottom: 20px;
    }

    .card img {
        max-width: 100%;
        height: auto;
    }

    .card-body {
        text-align: center;
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
                <li><a href="usuario.php" title="Página Principal">Regresar</a></li>
                <li style="visibility: hidden;">...............................................................................................................................................................................................................................................................................................</li>

                <li>
                    <form action="buscar_productos.php" method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 custom-search-input" type="search" placeholder="Buscar producto" aria-label="Search" name="q">
                    <button class="btn btn-danger my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </li>
            </ul>
        </div>
    </div><br>
<?php
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $query = $_GET['q'];

    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', 'root', 'delicias');

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos de la base de datos
    $result = $conn->query("SELECT * FROM productos WHERE 
                    nombre_producto LIKE '%$query%' OR 
                    descripcion LIKE '%$query%' OR
                    correo_usuario LIKE '%$query%'");

    if ($result->num_rows > 0) {
        echo '<div class="container mt-4">';
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
            // Mostrar resultados mejorados
            echo '<div class="col-md-4">';
            echo '<div class="card mb-4">';
            echo '<img src="img/' . $row["imagen"] . '" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["nombre_producto"] . '</h5>';
            echo '<p class="card-text"><strong>Precio de Venta:</strong> ' . $row["precio_venta"] . '</p>';
            echo '<p class="card-text"><em>Descripción:</em> ' . $row["descripcion"] . '</p>';
            echo '<p class="card-text"><strong>Fecha:</strong> ' . $row["fecha"] . '</p>';
            echo '<p class="card-text"><strong>Correo del Usuario: </strong> ' . $row["correo_usuario"] . '</p>';
            echo '</div></div></div>';
        }
        echo '</div></div>';
    } else {
        echo "No se encontraron resultados en la base de datos.";
    }
    $conn->close();
} else {
    echo "Consulta no válida.";
}
?>
    
</body

