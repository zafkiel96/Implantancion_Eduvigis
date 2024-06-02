<?php
include 'conexion.php';

$action = $_GET['action'];

if ($action == 'list') {
    $sql = "SELECT * FROM grupos_familiares";
    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode(array('data' => $data));
} elseif ($action == 'add') {
    $nombre_familia = $_POST['nombre_familia'];
    $status = $_POST['status'];

    $sql = "INSERT INTO grupos_familiares (nombre_familia, status) VALUES ('$nombre_familia', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => $conn->error));
    }
} elseif ($action == 'edit') {
    $id_grupo_flia = $_POST['id_grupo_flia'];
    $nombre_familia = $_POST['nombre_familia'];
    $status = $_POST['status'];
    $id_jefe_familia = $_POST['id_jefe_familia'];

    $sql = "UPDATE grupos_familiares SET nombre_familia='$nombre_familia', status='$status' WHERE id_grupo_flia='$id_grupo_flia'";
    if ($conn->query($sql) === TRUE) {
        $sql_update_jefe = "UPDATE usuarios_grupos_familiares SET jefe_familia='SI' WHERE id_usuario='$id_jefe_familia' AND id_grupo_flia='$id_grupo_flia'";
        $conn->query($sql_update_jefe);

        $sql_reset_otros = "UPDATE usuarios_grupos_familiares SET jefe_familia='NO' WHERE id_usuario!='$id_jefe_familia' AND id_grupo_flia='$id_grupo_flia'";
        $conn->query($sql_reset_otros);

        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => $conn->error));
    }
} elseif ($action == 'list_personas') {
    $sql = "SELECT id_persona, primer_nombre, primer_apellido FROM personas WHERE id_grupo_flia IS NULL";
    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} elseif ($action == 'assign') {
    $id_grupo_flia = $_POST['id_grupo_flia'];
    $id_persona = $_POST['id_persona'];
    $parentesco = $_POST['parentesco'];

    $sql = "INSERT INTO usuarios_grupos_familiares (id_usuario, id_grupo_flia, parentesco, jefe_familia) 
            SELECT '$id_persona', '$id_grupo_flia', '$parentesco', 'NO' 
            FROM DUAL 
            WHERE NOT EXISTS (
                SELECT 1 FROM usuarios_grupos_familiares WHERE id_usuario='$id_persona' AND id_grupo_flia='$id_grupo_flia'
            )";
    if ($conn->query($sql) === TRUE) {
        
        $sql_update_persona = "UPDATE personas SET id_grupo_flia='$id_grupo_flia' WHERE id_persona='$id_persona'";
        $conn->query($sql_update_persona);

        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => $conn->error));
    }
} elseif ($action == 'view_group') {
    $id_grupo_flia = $_GET['id_grupo_flia'];
    $sql = "SELECT p.id_persona, p.primer_nombre, p.primer_apellido, p.cedula, ugf.parentesco, 
            (CASE WHEN ugf.jefe_familia = 'SI' THEN 'Sí' ELSE 'No' END) AS jefe_familia
            FROM personas p
            LEFT JOIN usuarios_grupos_familiares ugf ON p.id_persona = ugf.id_usuario
            WHERE ugf.id_grupo_flia='$id_grupo_flia'";
    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}

$conn->close();
?>
