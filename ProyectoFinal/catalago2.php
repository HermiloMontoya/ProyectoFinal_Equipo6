<?php
// Crear conexión a la base de datos
$conn = new mysqli('localhost', 'root', 'root', 'delicias');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado una solicitud para eliminar un usuario
if (isset($_GET['eliminar_usuario'])) {
    $id_usuario = $_GET['eliminar_usuario'];

    // Eliminar el usuario de la base de datos
    $eliminarUsuario = $conn->prepare("DELETE FROM t_usuarios WHERE id = ?");
    $eliminarUsuario->bind_param('i', $id_usuario);
    $eliminarUsuario->execute();

    // Redirigir a la página después de la eliminación
    header('Location: catalago2.php');
    exit();
}

// Consultar la base de datos para obtener la información de usuarios
$result = $conn->query("SELECT * FROM t_usuarios");

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .table-container {
            margin-top: 50px;
        }
        .table-container table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table-container th, .table-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table-container th {
            background-color: #F5833E;
        }
        .edit-btn, .delete-btn {
            padding: 5px 10px;
            margin-right: 5px;
        }
        .edit-btn {
            background-color: #5cb85c;
            color: #fff;
            border: none;
        }
        .delete-btn {
            background-color: #d9534f;
            color: #fff;
            border: none;
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
                        <input class="form-control mr-sm-2 custom-search-input" type="search" placeholder="Buscar publicacion" aria-label="Search" name="q">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                    <li><a href="index.php" >Cerrar Sesion</a></li> 
        </ul>
        </div>
    <div class="container"><br><br><br><br><br><br><br><br><br>
        <h2>Catálogo de Usuarios</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($result->num_rows > 0) {
                         while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombreUsuario']}</td>
                            <td>{$row['aPaterno']}</td>
                            <td>{$row['aMaterno']}</td>
                            <td>{$row['correo']}</td>
                            <td>{$row['direccion']}</td>
                            <td>{$row['telefono']}</td>
                            <td>
                                <a href='editarUsuario.php?id={$row['id']}' class='btn btn-success edit-btn'>Editar</a>
                                <a href='catalago2.php?eliminar_usuario={$row['id']}' onclick='return confirmarEliminar();' class='btn btn-danger delete-btn'>Eliminar</a>
                            </td>
                            </tr>";
                    }
                    } else {
                        echo "<tr><td colspan='8'>No hay usuarios disponibles.</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function confirmarEliminar() {
            return confirm("¿Estás seguro de que quieres eliminar este usuario?");
        }
    </script>
</body>
</body>
</html>
