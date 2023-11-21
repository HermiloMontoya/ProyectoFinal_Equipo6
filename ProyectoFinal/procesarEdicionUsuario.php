<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idUsuario = $_POST["id_usuario"];
    $nombre = $_POST["nombre"];
    $aPaterno = $_POST["aPaterno"];
    $aMaterno = $_POST["aMaterno"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    // Crear conexión a la base de datos
    $conn = new mysqli('localhost', 'root', 'root', 'delicias');

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Actualizar los datos del usuario en la base de datos
    $editarUsuario = $conn->prepare("UPDATE t_usuarios SET nombreUsuario=?, aPaterno=?, aMaterno=?, correo=?, direccion=?, telefono=? WHERE id=?");
    $editarUsuario->bind_param('ssssssi', $nombre, $aPaterno, $aMaterno, $correo, $direccion, $telefono, $idUsuario);
    
    if ($editarUsuario->execute()) {
        // Redirigir a la página después de la edición exitosa
        header('Location: catalago2.php');
        exit();
    } else {
        // Manejar errores en la ejecución de la consulta
        echo "Error al editar el usuario: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Manejar solicitudes incorrectas
    echo "Solicitud no válida.";
}
?>
