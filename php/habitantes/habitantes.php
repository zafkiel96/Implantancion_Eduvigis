<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'fetchAll':
            fetchAll();
            break;
        case 'fetchById':
            fetchById($_POST['id']);
            break;
        case 'create':
            create();
            break;
        case 'update':
            update($_POST['id']);
            break;
        default:
            echo 'Invalid action';
            break;
    }
}

function fetchAll() {
    global $conn;
    $sql = "SELECT * FROM personas";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data);
}

function fetchById($id) {
    global $conn;
    $sql = "SELECT * FROM personas WHERE id_persona = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data);
}

function create() {
    global $conn;
    $sql = "INSERT INTO personas (id_tipo_usuario, id_grupo_flia, tipo_cedula, cedula, serial_carnet_patria, codigo_carnet_patria, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, genero, fecha_nacimiento, telefono, correo, parentesco, numero_hijos, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    $serial_carnet_patria = empty($_POST['serial_carnet_patria']) ? null : $_POST['serial_carnet_patria'];
    $codigo_carnet_patria = empty($_POST['codigo_carnet_patria']) ? null : $_POST['codigo_carnet_patria'];
    mysqli_stmt_bind_param($stmt, 'iisssssssssssssss', $_POST['id_tipo_usuario'], $_POST['id_grupo_flia'], $_POST['tipo_cedula'], $_POST['cedula'], $serial_carnet_patria, $codigo_carnet_patria, $_POST['primer_nombre'], $_POST['segundo_nombre'], $_POST['primer_apellido'], $_POST['segundo_apellido'], $_POST['genero'], $_POST['fecha_nacimiento'], $_POST['telefono'], $_POST['correo'], $_POST['parentesco'], $_POST['numero_hijos'], $_POST['status']);
    if (mysqli_stmt_execute($stmt)) {
        echo 'success';
    } else {
        echo 'error';
    }
}

function update($id) {
    global $conn;
    $sql = "UPDATE personas SET id_tipo_usuario = ?, id_grupo_flia = ?, tipo_cedula = ?, cedula = ?, serial_carnet_patria = ?, codigo_carnet_patria = ?, primer_nombre = ?, segundo_nombre = ?, primer_apellido = ?, segundo_apellido = ?, genero = ?, fecha_nacimiento = ?, telefono = ?, correo = ?, parentesco = ?, numero_hijos = ?, status = ? WHERE id_persona = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $serial_carnet_patria = empty($_POST['serial_carnet_patria']) ? null : $_POST['serial_carnet_patria'];
    $codigo_carnet_patria = empty($_POST['codigo_carnet_patria']) ? null : $_POST['codigo_carnet_patria'];
    mysqli_stmt_bind_param($stmt, 'iisssssssssssssssi', $_POST['id_tipo_usuario'], $_POST['id_grupo_flia'], $_POST['tipo_cedula'], $_POST['cedula'], $serial_carnet_patria, $codigo_carnet_patria, $_POST['primer_nombre'], $_POST['segundo_nombre'], $_POST['primer_apellido'], $_POST['segundo_apellido'], $_POST['genero'], $_POST['fecha_nacimiento'], $_POST['telefono'], $_POST['correo'], $_POST['parentesco'], $_POST['numero_hijos'], $_POST['status'], $id);
    if (mysqli_stmt_execute($stmt)) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>