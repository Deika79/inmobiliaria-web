<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'admin') {
    echo "Acceso no permitido";
    exit();
}

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$correo = $_POST['correo'];
$tipo = $_POST['tipo_usuario'];

$sql = "UPDATE usuario 
        SET nombres='$nombres', correo='$correo', tipo_usuario='$tipo'
        WHERE usuario_id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Usuario actualizado<br>";
    echo "<a href='usuarios.php'>Volver</a>";
} else {
    echo "Error: " . $conn->error;
}
?>