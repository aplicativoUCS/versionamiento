<?php

$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "ucs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

?>