<?php
// ------------------------------------------------------
// conexion.php
// Archivo encargado de conectar PHP con la base de datos.
// ------------------------------------------------------

// Datos de conexión para MAMP en macOS.
// Si usas XAMPP, normalmente puedes cambiar:
// $host = "localhost";
// $puerto = "3306";
// $password = "";
$host = "localhost";
$puerto = "3306";
$base_datos = "evaluacion_php4g";
$usuario = "root";
$password = "";

try {
    // Creamos la conexión usando PDO.
    $conexion = new PDO(
        "mysql:host=$host;port=$puerto;dbname=$base_datos;charset=utf8mb4",
        $usuario,
        $password
    );

    // Activamos el modo de errores para que PDO avise si algo falla.
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $error) {
    // Si la conexión falla, detenemos el programa y mostramos un mensaje claro.
    die("Error de conexión: " . $error->getMessage());
}
?>