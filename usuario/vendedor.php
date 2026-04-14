<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../public/login.php");
    exit();
}
?>

<h1>Bienvenido vendedor <?php echo $_SESSION['nombre']; ?></h1>
<br><br>
<a href="../pisos/crear.php">Crear nuevo piso</a>
<a href="../logout.php">Cerrar sesión</a>