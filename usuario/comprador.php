<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../public/login.php");
    exit();
}
?>

<h1>Bienvenido comprador <?php echo $_SESSION['nombre']; ?></h1>
<a href="../logout.php">Cerrar sesión</a>