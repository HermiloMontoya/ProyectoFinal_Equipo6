<?php
//Conexion PDO

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');//indica el nombre de usuario
    define('DB_PASS', 'root');//Indica la contraseña
    define('DB_NAME', 'delicias');//Nombre de la base de datos

    // Ahora, establecemos la conexión.
    try {
        // Ejecutamos las variables y aplicamos UTF8
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        //echo "Conexión Satisfactoria";
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
    return $conn;
?>