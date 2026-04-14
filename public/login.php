<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form action="procesar_login.php" method="POST">
    <input type="email" name="correo" placeholder="Correo" required><br><br>
    <input type="password" name="clave" placeholder="Contraseña" required><br><br>

    <button type="submit">Entrar</button>
</form>

</body>
</html>