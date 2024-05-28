<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usrname'];
    $contrasena = $_POST['psw'];

    // Verificar si el usuario existe
    $sql = "SELECT id_usuario, contraseña FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if ($user_id) {
        // Verificar la contraseña
        if ($contrasena == $hashed_password) { // Aquí asumimos que la contraseña no está hasheada, pero deberías usar password_verify para contraseñas hasheadas
            $_SESSION['user_id'] = $user_id;
            $response = ['status' => 'success', 'message' => 'Ingreso exitoso'];
        } else {
            $response = ['status' => 'error', 'message' => 'Contraseña incorrecta'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Usuario no encontrado'];
    }

    echo json_encode($response);
}
?>