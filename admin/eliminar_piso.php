<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'admin') {
    echo "Acceso no permitido";
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM pisos WHERE codigo_piso = $id";

if ($conn->query($sql) === TRUE) {
    echo "Piso eliminado<br>";
    echo "<a href='pisos.php'>Volver</a>";
} else {
    echo "Error: " . $conn->error;
}
?>