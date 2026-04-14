<?php
include("../config/db.php");

/* CONSULTA DINÁMICA */
$sql = "SELECT * FROM pisos WHERE 1=1";

if (!empty($_GET['zona'])) {
    $zona = $_GET['zona'];
    $sql .= " AND zona LIKE '%$zona%'";
}

if (!empty($_GET['precio_max'])) {
    $precio = $_GET['precio_max'];
    $sql .= " AND precio <= $precio";
}

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

<form method="GET">
    <input type="text" name="zona" placeholder="Zona">
    <input type="number" name="precio_max" placeholder="Precio máximo">
    <button type="submit">Buscar</button>
</form>

<hr>

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