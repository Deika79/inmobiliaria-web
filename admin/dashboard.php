<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'admin') {
    header("Location: ../public/login.php");
    exit();
}
?>

<h1>Panel de administrador</h1>
<a href="../logout.php">Cerrar sesión</a>