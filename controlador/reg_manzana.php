<?php
include 'conexion.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_manzana = $_POST['numero_manzana'];
    $obs_manzana = $_POST['ob_manzana'];
    $sql = "INSERT INTO `manzanas` (`numero_manzana`, `observacion`) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("is", $numero_manzana, $obs_manzana);
        if ($stmt->execute()) {
            echo "Manzana registrada correctamente.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta de inserción: " . $conn->error;
    }
    $conn->close();
}
?>