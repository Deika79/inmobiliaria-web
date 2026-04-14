<?php
include("../config/db.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>

<h2>Registro de usuario</h2>

<form action="procesar_registro.php" method="POST">
    <input type="text" name="nombres" placeholder="Nombre" required><br><br>
    <input type="email" name="correo" placeholder="Correo" required><br><br>
    <input type="password" name="clave" placeholder="Contraseña" required><br><br>

    <select name="tipo_usuario">
        <option value="comprador">Comprador</option>
        <option value="vendedor">Vendedor</option>
    </select><br><br>

    <button type="submit">Registrarse</button>
</form>

</body>
</html>