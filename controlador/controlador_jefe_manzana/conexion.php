<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "eduvigis";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}
?>