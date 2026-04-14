<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'admin') {
    echo "Acceso no permitido";
    exit();
}

$sql = "SELECT * FROM pisos";
$resultado = $conn->query($sql);
?>

<h1>Pisos</h1>

<?php
while($p = $resultado->fetch_assoc()) {
    echo "<hr>";
    echo "ID: " . $p['codigo_piso'] . "<br>";
    echo "Calle: " . $p['calle'] . "<br>";
    echo "Precio: " . $p['precio'] . "<br>";

    echo " | <a href='editar_piso.php?id=" . $p['codigo_piso'] . "'>Editar</a>";

    echo "<a href='eliminar_piso.php?id=" . $p['codigo_piso'] . "'>Eliminar</a>";
}
?>