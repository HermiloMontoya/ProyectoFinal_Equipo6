<?php
session_start();
require("../modelo/conexionPDO.php");

if (isset($_POST['correo']) && isset($_POST['clave'])) {
    $_SESSION['correo']  = $_POST['correo'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $consulta = $conn->prepare("SELECT correo, clave FROM t_usuarios WHERE correo = :correo");
    $consulta->bindParam(':correo', $correo);
    $consulta->execute();

    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($resultado && password_verify($clave, $resultado['clave'])) {
        // Verificar el dominio del correo
        $dominio = explode('@', $correo)[1];

        if ($dominio === 'unach.mx') {
            // Redirigir a modo administrador
            header('Location: ../modoAdministrador.php');
            exit();
        } elseif ($dominio === 'gmail.com') {
            // Redirigir a modo proveedor
            header('Location: ../proveedor.php');
            exit();
        } else {
            // Otros dominios
            header('Location: ../IniciarSesion.php');
            exit();
        }
    } else {
        // Usuario o contraseña incorrectos
        header('Location: ../IniciarSesion.php');
        exit();
    }
} else {
    // Datos incompletos
    header('Location: ../IniciarSesion.php');
    exit();
}
?>



