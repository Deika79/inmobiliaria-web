<?php
session_start();
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

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h1>Listado de pisos</h1>

<form method="GET">
    <input type="text" name="zona" placeholder="Zona">
    <input type="number" name="precio_max" placeholder="Precio máximo">
    <button type="submit">Buscar</button>
</form>

<?php
if ($resultado->num_rows > 0) {
    while($piso = $resultado->fetch_assoc()) {

        echo "<div class='piso'>";

        echo "<h3>" . $piso['calle'] . " " . $piso['numero'] . "</h3>";

        if (!empty($piso['imagen'])) {
            echo "<img src='../assets/img/" . $piso['imagen'] . "'>";
        }

        echo "<p><strong>Zona:</strong> " . $piso['zona'] . "</p>";
        echo "<p><strong>Metros:</strong> " . $piso['metros'] . " m²</p>";
        echo "<p><strong>Precio:</strong> " . $piso['precio'] . " €</p>";

        /* BOTÓN COMPRAR */
        if (isset($_SESSION['usuario_id']) && $_SESSION['tipo'] == 'comprador') {
            echo "<form action='comprar.php' method='POST'>";
            echo "<input type='hidden' name='codigo_piso' value='" . $piso['codigo_piso'] . "'>";
            echo "<input type='hidden' name='precio' value='" . $piso['precio'] . "'>";
            echo "<button type='submit'>Comprar</button>";
            echo "</form>";
        }

        echo "</div>";
    }
} else {
    echo "<p style='text-align:center;'>No hay pisos disponibles</p>";
}
?>

</body>
</html>