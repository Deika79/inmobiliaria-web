<?php
session_start();
include("../config/db.php");

$correo = $_POST['correo'];
$clave = $_POST['clave'];

/* BUSCAR USUARIO */
$sql = "SELECT * FROM usuario WHERE correo = '$correo'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();

    /* VERIFICAR CONTRASEÑA */
    if (password_verify($clave, $usuario['clave'])) {

        /* GUARDAR SESIÓN */
        $_SESSION['usuario_id'] = $usuario['usuario_id'];
        $_SESSION['nombre'] = $usuario['nombres'];
        $_SESSION['tipo'] = $usuario['tipo_usuario'];

        /* REDIRECCIÓN SEGÚN TIPO */
        if ($usuario['tipo_usuario'] == 'comprador') {
            header("Location: ../usuario/comprador.php");
        } elseif ($usuario['tipo_usuario'] == 'vendedor') {
            header("Location: ../usuario/vendedor.php");
        } elseif ($usuario['tipo_usuario'] == 'admin') {
            header("Location: ../admin/dashboard.php");
        }

    } else {
        echo "Contraseña incorrecta";
    }

} else {
    echo "Usuario no encontrado";
}
?>