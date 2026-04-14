<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'admin') {
    echo "Acceso no permitido";
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM usuario WHERE usuario_id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Usuario eliminado<br>";
    echo "<a href='usuarios.php'>Volver</a>";
} else {
    echo "Error: " . $conn->error;
}
?>