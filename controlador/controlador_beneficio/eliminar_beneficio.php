<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se recibieron los parámetros adecuados en el formulario
    if (isset($_POST["id"])) {
        $beneficio_id = $_POST["id"]; // Cambiado a "id" para que coincida con la solicitud AJAX

        // Preparar y ejecutar la sentencia SQL de eliminación
        $sql = "DELETE FROM beneficios WHERE id_beneficio = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("i", $beneficio_id); // "i" indica que es un entero

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "success"; // Cambiado para que coincida con el manejo de éxito en JavaScript
            } else {
                echo "Error al intentar eliminar el beneficio: " . $stmt->error;
            }

            // Cerrar la consulta
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $conn->error;
        }
    } else {
        echo "Error: No se recibió el parámetro id.";
    }
}

// Cerrar la conexión
$conn->close();
?>
