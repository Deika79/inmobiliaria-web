<?php
include("../config/db.php");

$nombres = $_POST['nombres'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$tipo_usuario = $_POST['tipo_usuario'];

/* 🔐 ENCRIPTAR CONTRASEÑA */
$clave_segura = password_hash($clave, PASSWORD_DEFAULT);

/* INSERTAR */
$sql = "INSERT INTO usuario (nombres, correo, clave, tipo_usuario)
        VALUES ('$nombres', '$correo', '$clave_segura', '$tipo_usuario')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario registrado correctamente <br>";
    echo "<a href='login.php'>Ir al login</a>";
} else {
    echo "Error: " . $conn->error;
}
?>