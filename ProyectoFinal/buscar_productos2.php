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

    .eliminar-btn,
    .editar-btn {
        display: block;
        margin: 10px auto;
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
    </div><br><br>
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
            echo '<a href="#" class="btn btn-danger eliminar-btn" data-id="' . $row['id'] . '">Eliminar</a>';
            echo '<a href="editarProducto.php?id=' . $row['id'] . '" class="btn btn-primary editar-btn">Editar</a>';
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
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
    
</body
