<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../public/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel comprador</title>
</head>
<body>

<h1>Bienvenido comprador <?php echo $_SESSION['nombre']; ?></h1>

<nav>
    <a href="../pisos/listar.php">Ver pisos</a> |
    <a href="../logout.php">Cerrar sesión</a>
</nav>

</body>
</html>