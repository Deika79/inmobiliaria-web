<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'admin') {
    echo "Acceso no permitido";
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM pisos WHERE codigo_piso = $id";
$result = $conn->query($sql);
$piso = $result->fetch_assoc();
?>

<h1>Editar piso</h1>

<form action="actualizar_piso.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $piso['codigo_piso']; ?>">

    Calle: <input type="text" name="calle" value="<?php echo $piso['calle']; ?>"><br><br>
    Número: <input type="number" name="numero" value="<?php echo $piso['numero']; ?>"><br><br>
    Piso: <input type="number" name="piso" value="<?php echo $piso['piso']; ?>"><br><br>
    Puerta: <input type="text" name="puerta" value="<?php echo $piso['puerta']; ?>"><br><br>
    CP: <input type="number" name="cp" value="<?php echo $piso['cp']; ?>"><br><br>
    Metros: <input type="number" name="metros" value="<?php echo $piso['metros']; ?>"><br><br>
    Zona: <input type="text" name="zona" value="<?php echo $piso['zona']; ?>"><br><br>
    Precio: <input type="number" name="precio" value="<?php echo $piso['precio']; ?>"><br><br>

    <button type="submit">Actualizar piso</button>
</form>