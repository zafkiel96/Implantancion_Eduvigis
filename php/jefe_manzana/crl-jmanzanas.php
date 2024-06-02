<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'registrar') {
            $cedula = $_POST['cedula'];
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];
            $correo = $_POST['correo'];
            $status = $_POST['status'];
            $tipo = 'Jefe Manzana';

            $sql = "INSERT INTO usuarios (cedula, usuario, contraseña, correo, status) VALUES ('$cedula', '$usuario', '$contraseña', '$correo', '$status')";
            if ($conn->query($sql) === TRUE) {
                $id_usuario = $conn->insert_id;
                $sql_tipo = "INSERT INTO tipos_usuarios (id_usuario, cedula, tipo, status) VALUES ('$id_usuario', '$cedula', '$tipo', '$status')";
                if ($conn->query($sql_tipo) === TRUE) {
                    echo "Registro exitoso";
                } else {
                    echo "Error: " . $sql_tipo . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } elseif ($_POST['action'] === 'editar') {
            $id_usuario = $_POST['id_usuario'];
            $usuario = $_POST['usuario'];
            $correo = $_POST['correo'];
            $status = $_POST['status'];

            if (!empty($_POST['contraseña'])) {
                $contraseña = $_POST['contraseña'];
                $sql = "UPDATE usuarios SET usuario='$usuario', contraseña='$contraseña', correo='$correo', status='$status' WHERE id_usuario='$id_usuario'";
            } else {
                $sql = "UPDATE usuarios SET usuario='$usuario', correo='$correo', status='$status' WHERE id_usuario='$id_usuario'";
            }

            if ($conn->query($sql) === TRUE) {
                echo "Actualización exitosa";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'obtener') {
        $id_usuario = $_GET['id_usuario'];
        $sql = "SELECT usuario, correo, status, contraseña FROM usuarios WHERE id_usuario = '$id_usuario'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo json_encode($result->fetch_assoc());
        } else {
            echo json_encode([]);
        }
    }
}
?>