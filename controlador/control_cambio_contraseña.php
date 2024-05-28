<?php
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $usuario = $_POST['usrname'];
    $cedula = $_POST['ci'];
    $nueva_contrasena = $_POST['psw'];
    $confirmar_contrasena = $_POST['confirm_psw'];

    // Verificar que la contraseña y la confirmación coincidan
    if ($nueva_contrasena != $confirmar_contrasena) {
        $response = ['status' => 'error', 'message' => 'Las contraseñas no coinciden.'];
    } else {
        // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
        include 'conexion.php';

        // Consulta para verificar si el usuario y la cédula existen en la base de datos
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND cedula = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $usuario, $cedula);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // El usuario y la cédula coinciden, actualizar la contraseña en la base de datos
            $row = $result->fetch_assoc();
            $id_usuario = $row['id_usuario']; // Suponiendo que hay un campo 'id_usuario' en tu tabla de usuarios

            // Actualizar la contraseña
            $sql_update = "UPDATE usuarios SET contraseña = ? WHERE id_usuario = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("si", $nueva_contrasena, $id_usuario);
            if ($stmt_update->execute() === TRUE) {
                // Contraseña actualizada exitosamente
                $response = ['status' => 'success', 'message' => 'Contraseña actualizada exitosamente.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Error al actualizar la contraseña: ' . $conn->error];
            }
        } else {
            // El usuario o la cédula no coinciden en la base de datos
            $response = ['status' => 'error', 'message' => 'Usuario no encontrado.'];
        }

        $stmt->close();
        $conn->close();
    }

    echo json_encode($response);
}
?>
