<?php
include 'auth.php';
include 'db.php';
$id = $_GET['id'];

# Consulta de eliminacion
$conn->query("DELETE FROM proyectos WHERE id=$id");
header("Location: index.php");
?>
  