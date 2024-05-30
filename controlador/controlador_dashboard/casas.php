<?php
include 'conexion.php';
$sql = "SELECT MAX(id_casa) AS ultimo_id FROM casas";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo  $row['ultimo_id'];
} else {
    echo "No se encontraron resultados.";
}
$conn->close();
?>