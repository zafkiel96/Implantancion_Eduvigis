<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usrname'];
    $cedula = $_POST['ci'];
    $nueva_contrasena = $_POST['psw'];
    $confirmar_contrasena = $_POST['confirm_psw'];
    if ($nueva_contrasena != $confirmar_contrasena) {
        $response = ['status' => 'error', 'message' => 'Las contraseñas no coinciden.'];
    } else {
        include 'conexion.php';
        $sql = "SELECT * FROM usuarios WHERE usuario = ? AND cedula = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $usuario, $cedula);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_usuario = $row['id_usuario'];
            $sql_update = "UPDATE usuarios SET contraseña = ? WHERE id_usuario = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("si", $nueva_contrasena, $id_usuario);
            if ($stmt_update->execute() === TRUE) {
                $response = ['status' => 'success', 'message' => 'Contraseña actualizada exitosamente.'];
            } else {
                $response = ['status' => 'error', 'message' => 'Error al actualizar la contraseña: ' . $conn->error];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Usuario no encontrado.'];
        }
        $stmt->close();
        $conn->close();
    }
    echo json_encode($response);
}
?>