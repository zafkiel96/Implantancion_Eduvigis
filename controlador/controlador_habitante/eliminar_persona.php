<link rel="stylesheet" href="../styles/styles.css">
<link rel="stylesheet" type="text/css" href="../styles/jquery.dataTables.css">
<link rel="stylesheet" href="../styles/sweetalert2.min.css">
<script src="../scripts/sweetalert2.all.min.js"></script>
<script type="text/javascript" charset="utf8" src="../scripts/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="../scripts/jquery.dataTables.js"></script>

<?php

include '../controlador/conexion.php';

// Verifica si se ha enviado una solicitud para eliminar una persona
if (isset($_POST['id_persona'])) {
    $id_persona_a_eliminar = $_POST['id_persona'];
    eliminarPersona($id_persona_a_eliminar);
}

// Función para eliminar una persona por su ID
function eliminarPersona($id_persona) {
    global $conn;
    
    $sql = "DELETE FROM personas WHERE id_persona = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_persona);
    
    if ($stmt->execute() === TRUE) {
        // Si la eliminación fue exitosa, muestra una alerta de éxito
        echo json_encode(array("status" => "success", "message" => "Persona eliminada exitosamente."));
    } else {
        // Si hubo un error en la eliminación, muestra una alerta de error
        echo json_encode(array("status" => "error", "message" => "No se pudo eliminar la persona. Por favor, inténtalo de nuevo más tarde."));
    }
    
    $stmt->close();
    exit; // Detener la ejecución del script después de enviar la respuesta
}
