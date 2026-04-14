<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'admin') {
    echo "Acceso no permitido";
    exit();
}

$id = $_POST['id'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$piso = $_POST['piso'];
$puerta = $_POST['puerta'];
$cp = $_POST['cp'];
$metros = $_POST['metros'];
$zona = $_POST['zona'];
$precio = $_POST['precio'];

$sql = "UPDATE pisos SET 
    calle='$calle',
    numero='$numero',
    piso='$piso',
    puerta='$puerta',
    cp='$cp',
    metros='$metros',
    zona='$zona',
    precio='$precio'
    WHERE codigo_piso=$id";

if ($conn->query($sql) === TRUE) {
    echo "Piso actualizado<br>";
    echo "<a href='pisos.php'>Volver</a>";
} else {
    echo "Error: " . $conn->error;
}
?>