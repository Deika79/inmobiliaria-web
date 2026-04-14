<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'admin') {
    echo "Acceso no permitido";
    exit();
}

$id = $_GET['id'];

/* OBTENER USUARIO */
$sql = "SELECT * FROM usuario WHERE usuario_id = $id";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();
?>

<h1>Editar usuario</h1>

<form action="actualizar_usuario.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $usuario['usuario_id']; ?>">

    Nombre: <input type="text" name="nombres" value="<?php echo $usuario['nombres']; ?>"><br><br>
    Correo: <input type="email" name="correo" value="<?php echo $usuario['correo']; ?>"><br><br>

    Tipo:
    <select name="tipo_usuario">
        <option value="comprador" <?php if($usuario['tipo_usuario']=="comprador") echo "selected"; ?>>Comprador</option>
        <option value="vendedor" <?php if($usuario['tipo_usuario']=="vendedor") echo "selected"; ?>>Vendedor</option>
        <option value="admin" <?php if($usuario['tipo_usuario']=="admin") echo "selected"; ?>>Admin</option>
    </select><br><br>

    <button type="submit">Actualizar</button>
</form>