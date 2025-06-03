<?php
$host = "localhost";
$db = "portafolio_db";
$user = "root";
$pass = "";

# Conexion a base de datos
 
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}
?>