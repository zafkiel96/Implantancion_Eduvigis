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
        // Si la eliminación fue exitosa, devuelve una respuesta de éxito
        echo json_encode(array("status" => "success", "message" => "Persona eliminada exitosamente."));
    } else {
        // Si hubo un error en la eliminación, devuelve una respuesta de error
        echo json_encode(array("status" => "error", "message" => "No se pudo eliminar la persona. Por favor, inténtalo de nuevo más tarde."));
    }
    
    $stmt->close();
    exit; // Detener la ejecución del script después de enviar la respuesta
}

$sql = "SELECT id_persona, primer_nombre, primer_apellido, cedula, fecha_nacimiento, telefono FROM personas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['primer_nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($row['primer_apellido']) . "</td>";
        echo "<td>" . htmlspecialchars($row['cedula']) . "</td>";
        echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
        echo "<td>  
                    <button class='btn-ver' onclick=\"verDatos(" . htmlspecialchars($row['id_persona']) . ")\"><i class='bx bx-show'></i> Ver</button>
                    <button class='btn-editar' onclick=\"editarRegistro(" . htmlspecialchars($row['id_persona']) . ")\"><i class='bx bx-edit'></i> Editar</button>
                    <button class='btn-eliminar' onclick=\"confirmarEliminar(" . htmlspecialchars($row['id_persona']) . ")\"><i class='bx bx-trash'></i> Eliminar</button>
                </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No se encontraron registros</td></tr>";
}
$conn->close();

?>

<script>
    function confirmarEliminar(idPersona) {
        // Muestra una alerta de confirmación antes de eliminar el registro
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción eliminará permanentemente el registro.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, envía una solicitud para eliminar la persona
                $.ajax({
                    type: 'POST',
                    url: 'pagina.php', // Reemplaza 'pagina.php' con el nombre de este archivo PHP
                    data: { id_persona: idPersona },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.status === 'success') {
                            Swal.fire({
                                title: 'Éxito!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                // Después de cerrar la alerta, recarga la página para actualizar la tabla
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Hubo un error al procesar la solicitud. Por favor, inténtalo de nuevo más tarde.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    }
</script>
