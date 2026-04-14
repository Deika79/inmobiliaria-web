<?php
include("../config/db.php");

/* CONSULTAR PISOS */
$sql = "SELECT * FROM pisos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de pisos</title>
</head>
<body>

<h1>Listado de pisos</h1>

<?php
if ($resultado->num_rows > 0) {
    while($piso = $resultado->fetch_assoc()) {
        echo "<hr>";
        echo "<h3>" . $piso['calle'] . " " . $piso['numero'] . "</h3>";
        echo "Piso: " . $piso['piso'] . " - Puerta: " . $piso['puerta'] . "<br>";
        echo "CP: " . $piso['cp'] . "<br>";
        echo "Metros: " . $piso['metros'] . " m²<br>";
        echo "Zona: " . $piso['zona'] . "<br>";
        echo "Precio: " . $piso['precio'] . " €<br>";

        if (!empty($piso['imagen'])) {
            echo "<img src='../assets/img/" . $piso['imagen'] . "' width='200'><br>";
        }
    }
} else {
    echo "No hay pisos disponibles";
}
?>

</body>
</html>