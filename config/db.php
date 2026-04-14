<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "inmobiliaria";
$port = 3307; // IMPORTANTE

$conn = new mysqli($host, $user, $password, $db, $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>