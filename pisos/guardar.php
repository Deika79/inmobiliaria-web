<?php
session_start();
include("../config/db.php");

/* SEGURIDAD */
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'vendedor') {
    echo "Acceso no permitido";
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$calle = $_POST['calle'];
$numero = $_POST['numero'];
$piso = $_POST['piso'];
$puerta = $_POST['puerta'];
$cp = $_POST['cp'];
$metros = $_POST['metros'];
$zona = $_POST['zona'];
$precio = $_POST['precio'];

/* INSERTAR */
$sql = "INSERT INTO pisos (calle, numero, piso, puerta, cp, metros, zona, precio, usuario_id)
        VALUES ('$calle', '$numero', '$piso', '$puerta', '$cp', '$metros', '$zona', '$precio', '$usuario_id')";

if ($conn->query($sql) === TRUE) {
    echo "Piso creado correctamente<br>";
    echo "<a href='../usuario/vendedor.php'>Volver</a>";
} else {
    echo "Error: " . $conn->error;
}
?>