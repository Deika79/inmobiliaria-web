<?php
session_start();
include("../config/db.php");

/* SOLO ADMIN */
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'admin') {
    echo "Acceso no permitido";
    exit();
}

/* CONSULTA */
$sql = "SELECT * FROM usuario";
$resultado = $conn->query($sql);
?>

<h1>Usuarios</h1>

<?php
while($u = $resultado->fetch_assoc()) {
    echo "<hr>";
    echo "ID: " . $u['usuario_id'] . "<br>";
    echo "Nombre: " . $u['nombres'] . "<br>";
    echo "Correo: " . $u['correo'] . "<br>";
    echo "Tipo: " . $u['tipo_usuario'] . "<br>";

    echo "<a href='eliminar_usuario.php?id=" . $u['usuario_id'] . "'>Eliminar</a>";
}
?>