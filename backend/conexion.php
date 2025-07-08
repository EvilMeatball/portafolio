<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "portafolio";

$conn = mysqli_connect($host, $user, $password, $db);

// Verifica la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
