<?php
include 'conexion.php';

$action = $_GET['action'];

if ($action == 'list') {
    $sql = "SELECT * FROM personas";
    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode(array('data' => $data));
} elseif ($action == 'add') {
    
    $tipo_cedula = $_POST['tipo_cedula'];
    $cedula = $_POST['cedula'];
    $serial_carnet_patria = $_POST['serial_carnet_patria'];
    $codigo_carnet_patria = $_POST['codigo_carnet_patria'];
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $parentesco = $_POST['parentesco'];
    $numero_hijos = $_POST['numero_hijos'];
    $status = $_POST['status'];

    $check_cedula = "SELECT * FROM personas WHERE cedula='$cedula'";
    $check_serial = "SELECT * FROM personas WHERE serial_carnet_patria='$serial_carnet_patria'";
    $check_codigo = "SELECT * FROM personas WHERE codigo_carnet_patria='$codigo_carnet_patria'";

    $check_cedula_result = $conn->query($check_cedula);
    $check_serial_result = $conn->query($check_serial);
    $check_codigo_result = $conn->query($check_codigo);

    if ($check_cedula_result->num_rows > 0) {
        echo json_encode(array('status' => 'error', 'message' => 'duplicado_cedula'));
    } elseif ($check_serial_result->num_rows > 0) {
        echo json_encode(array('status' => 'error', 'message' => 'duplicado_serial'));
    } elseif ($check_codigo_result->num_rows > 0) {
        echo json_encode(array('status' => 'error', 'message' => 'duplicado_codigo'));
    } else {
        $sql = "INSERT INTO personas (tipo_cedula, cedula, serial_carnet_patria, codigo_carnet_patria, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, genero, fecha_nacimiento, telefono, correo, parentesco, numero_hijos, status) VALUES ('$tipo_cedula', '$cedula', '$serial_carnet_patria', '$codigo_carnet_patria', '$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$genero', '$fecha_nacimiento', '$telefono', '$correo', '$parentesco', '$numero_hijos', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => $conn->error));
        }
    }
} elseif ($action == 'edit') {
    $id_persona = $_POST['id_persona'];
    $tipo_cedula = $_POST['tipo_cedula'];
    $cedula = $_POST['cedula'];
    $serial_carnet_patria = $_POST['serial_carnet_patria'];
    $codigo_carnet_patria = $_POST['codigo_carnet_patria'];
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $parentesco = $_POST['parentesco'];
    $numero_hijos = $_POST['numero_hijos'];
    $status = $_POST['status'];

    $check_cedula = "SELECT * FROM personas WHERE cedula='$cedula' AND id_persona != '$id_persona'";
    $check_serial = "SELECT * FROM personas WHERE serial_carnet_patria='$serial_carnet_patria' AND id_persona != '$id_persona'";
    $check_codigo = "SELECT * FROM personas WHERE codigo_carnet_patria='$codigo_carnet_patria' AND id_persona != '$id_persona'";

    $check_cedula_result = $conn->query($check_cedula);
    $check_serial_result = $conn->query($check_serial);
    $check_codigo_result = $conn->query($check_codigo);

    if ($check_cedula_result->num_rows > 0) {
        echo json_encode(array('status' => 'error', 'message' => 'duplicado_cedula'));
    } elseif ($check_serial_result->num_rows > 0) {
        echo json_encode(array('status' => 'error', 'message' => 'duplicado_serial'));
    } elseif ($check_codigo_result->num_rows > 0) {
        echo json_encode(array('status' => 'error', 'message' => 'duplicado_codigo'));
    } else {
        $sql = "UPDATE personas SET tipo_cedula='$tipo_cedula', cedula='$cedula', serial_carnet_patria='$serial_carnet_patria', codigo_carnet_patria='$codigo_carnet_patria', primer_nombre='$primer_nombre', segundo_nombre='$segundo_nombre', primer_apellido='$primer_apellido', segundo_apellido='$segundo_apellido', genero='$genero', fecha_nacimiento='$fecha_nacimiento', telefono='$telefono', correo='$correo', parentesco='$parentesco', numero_hijos='$numero_hijos', status='$status' WHERE id_persona='$id_persona'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => $conn->error));
        }
    }
}

$conn->close();
?>