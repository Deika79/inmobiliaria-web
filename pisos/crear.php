<?php
session_start();

/* SOLO VENDEDORES */
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'vendedor') {
    echo "Acceso no permitido";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear piso</title>
</head>
<body>

<h1>Crear nuevo piso</h1>

<form action="guardar.php" method="POST">
    <input type="text" name="calle" placeholder="Calle" required><br><br>
    <input type="number" name="numero" placeholder="Número" required><br><br>
    <input type="number" name="piso" placeholder="Piso" required><br><br>
    <input type="text" name="puerta" placeholder="Puerta" required><br><br>
    <input type="number" name="cp" placeholder="Código Postal" required><br><br>
    <input type="number" name="metros" placeholder="Metros" required><br><br>
    <input type="text" name="zona" placeholder="Zona"><br><br>
    <input type="number" name="precio" placeholder="Precio" required><br><br>

    <button type="submit">Guardar piso</button>
</form>

</body>
</html>