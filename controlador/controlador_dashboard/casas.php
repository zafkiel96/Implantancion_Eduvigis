<?php
include 'conexion.php';

// Consulta para obtener el último id_persona
$sql = "SELECT MAX(id_casa) AS ultimo_id FROM casas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    echo  $row['ultimo_id'];
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>