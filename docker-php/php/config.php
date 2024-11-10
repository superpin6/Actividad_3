<?php
// Definir constantes para la conexión a la base de datos
define('DB_SERVER', 'db');           //  'db' 
define('DB_USERNAME', 'root');       // Usuario de la base de datos
define('DB_PASSWORD', 'secret');     // Contraseña de la base de datos
define('DB_NAME', 'test');           // Nombre de la base de datos

// Intentar conexión a la base de datos
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar la conexión
if ($connection === false) {
    die("ERROR: No se pudo conectar a la base de datos. " . mysqli_connect_error());
}
?>
