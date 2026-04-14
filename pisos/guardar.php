<?php
session_start();
include("../config/db.php");

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

/* IMAGEN */
$imagen = $_FILES['imagen']['name'];
$ruta = "../assets/img/" . $imagen;

move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

/* INSERTAR */
$sql = "INSERT INTO pisos (calle, numero, piso, puerta, cp, metros, zona, precio, imagen, usuario_id)
        VALUES ('$calle', '$numero', '$piso', '$puerta', '$cp', '$metros', '$zona', '$precio', '$imagen', '$usuario_id')";

if ($conn->query($sql) === TRUE) {
    echo "Piso creado con imagen<br>";
    echo "<a href='../usuario/vendedor.php'>Volver</a>";
} else {
    echo "Error: " . $conn->error;
}
?>