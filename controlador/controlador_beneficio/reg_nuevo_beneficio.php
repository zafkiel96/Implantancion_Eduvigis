<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['RegistrarBeneficio'])) {
        // Registro del nuevo beneficio
        $nombre_beneficio = $_POST['beneficio_nuevo'];

        // Verificar si el nombre del beneficio ya existe
        $sql = "SELECT COUNT(*) AS count FROM beneficios WHERE nombre_beneficio = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombre_beneficio);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            // El beneficio ya existe
            echo json_encode(array('exists' => true));
        } else {
            // Insertar el nuevo beneficio
            $sql_insert = "INSERT INTO beneficios (nombre_beneficio, fecha_entregado, status) VALUES (?, now(), 'Activo')";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("s", $nombre_beneficio);

            if ($stmt_insert->execute()) {
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false, 'error' => 'Error al registrar el beneficio.'));
            }

            $stmt_insert->close();
        }

        $conn->close();
    }
}
?>
