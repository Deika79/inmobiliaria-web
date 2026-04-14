<?php
session_start();
include("../config/db.php");

/* SEGURIDAD */
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'comprador') {
    echo "Acceso no permitido";
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$codigo_piso = $_POST['codigo_piso'];
$precio = $_POST['precio'];

/* INSERTAR COMPRA */
$sql = "INSERT INTO comprados (usuario_comprador, codigo_piso, precio_final)
        VALUES ('$usuario_id', '$codigo_piso', '$precio')";

if ($conn->query($sql) === TRUE) {
    echo "Piso comprado correctamente<br>";
    echo "<a href='listar.php'>Volver</a>";
} else {
    echo "Error: " . $conn->error;
}
?>