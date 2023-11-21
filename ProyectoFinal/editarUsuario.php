<?php
// Verificar si se ha enviado una solicitud para editar un usuario
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Crear conexión a la base de datos
    $conn = new mysqli('localhost', 'root', 'root', 'delicias');

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del usuario con el ID proporcionado
    $query = "SELECT * FROM t_usuarios WHERE id = $idUsuario";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        
        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Usuario</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <script src="js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/style.css">
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
    </div> <br><br>
            <div class="container">
                <h2>Editar Usuario</h2><br>
                <form action="procesarEdicionUsuario.php" method="post">
                    <input type="hidden" name="id_usuario" value="<?php echo $usuario['id']; ?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $usuario['nombreUsuario']; ?>" required>

                    <label for="aPaterno">Apellido Paterno:</label>
                    <input type="text" name="aPaterno" value="<?php echo $usuario['aPaterno']; ?>" required>

                    <label for="aMaterno">Apellido Materno:</label>
                    <input type="text" name="aMaterno" value="<?php echo $usuario['aMaterno']; ?>" required>

                    <label for="correo">Correo:</label>
                    <input type="email" name="correo" value="<?php echo $usuario['correo']; ?>" required>

                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" value="<?php echo $usuario['direccion']; ?>" required>

                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" value="<?php echo $usuario['telefono']; ?>" required>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>

        </body>
        </html>

        <?php
    } else {
        // Si no se encuentra el usuario con el ID proporcionado, manejar el error
        echo "Usuario no encontrado.";
    }
} else {
    // Si no se proporciona un ID válido, manejar el error
    echo "ID de usuario no válido.";
}
?>