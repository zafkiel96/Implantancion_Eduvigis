<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'add') {
        $numero_casa = $_POST['numero_casa'];
        $id_manzana = $_POST['id_manzana'];
        $id_grupo_familiar = $_POST['id_grupo_familiar'];
        $anexo_casa = $_POST['anexo_casa'];
        $ten_casa = $_POST['ten_casa'];
        $status = $_POST['status'];

        $sql_check = "SELECT * FROM casas WHERE id_grupo_familiar='$id_grupo_familiar'";
        $result_check = $conn->query($sql_check);
        if ($result_check->num_rows > 0) {
            echo 'error';
        } else {
            $sql = "INSERT INTO casas (numero_casa, id_manzana, id_grupo_familiar, anexo_casa, ten_casa, status) 
                    VALUES ('$numero_casa', '$id_manzana', '$id_grupo_familiar', '$anexo_casa', '$ten_casa', '$status')";
            if ($conn->query($sql) === TRUE) {
                echo "Nuevo registro creado exitosamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } elseif ($action == 'edit') {
        $id_casa = $_POST['id_casa'];
        $numero_casa = $_POST['numero_casa'];
        $id_manzana = $_POST['id_manzana'];
        $id_grupo_familiar = $_POST['id_grupo_familiar'];
        $anexo_casa = $_POST['anexo_casa'];
        $ten_casa = $_POST['ten_casa'];
        $status = $_POST['status'];

        $sql_check = "SELECT * FROM casas WHERE id_grupo_familiar='$id_grupo_familiar' AND id_casa != '$id_casa'";
        $result_check = $conn->query($sql_check);
        if ($result_check->num_rows > 0) {
            echo 'error';
        } else {
            $sql = "UPDATE casas SET numero_casa='$numero_casa', id_manzana='$id_manzana', id_grupo_familiar='$id_grupo_familiar', 
                    anexo_casa='$anexo_casa', ten_casa='$ten_casa', status='$status' WHERE id_casa='$id_casa'";
            if ($conn->query($sql) === TRUE) {
                echo "Registro actualizado exitosamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == 'get') {
        $id_casa = $_GET['id'];
        $sql = "SELECT * FROM casas WHERE id_casa='$id_casa'";
        $result = $conn->query($sql);
        $house = $result->fetch_assoc();
        echo json_encode($house);
    }
}
?>