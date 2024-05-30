<?php
session_start();
include '../conexion.php';
$response = array();
if (!isset($_SESSION['user_id'])) {
    $response['error'] = "Acceso no autorizado.";
    echo json_encode($response);
    exit;
}
$id_usuario = $_SESSION['user_id'];
$beneficio_id = $_POST['beneficio_id'];
$grupo_familiar_id = $_POST['grupo_familiar_id'];
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$observacion = $conn->real_escape_string($_POST['observacion']);
echo "ID Usuario: $id_usuario<br>";
echo "Beneficio ID: $beneficio_id<br>";
echo "Grupo Familiar ID: $grupo_familiar_id<br>";
echo "Descripción: $descripcion<br>";
echo "Observación: $observacion<br>";
$sql_tipo_usuario = "SELECT id_tipo_usuario FROM tipos_usuarios WHERE id_usuario = ?";
$stmt_tipo_usuario = $conn->prepare($sql_tipo_usuario);
if ($stmt_tipo_usuario) {
    $stmt_tipo_usuario->bind_param("i", $id_usuario);
    $stmt_tipo_usuario->execute();
    $stmt_tipo_usuario->bind_result($id_tipo_usuario);
    $stmt_tipo_usuario->fetch();
    $stmt_tipo_usuario->close();
} else {
    $response['error'] = "Error en la preparación de la consulta para obtener el tipo de usuario: " . $conn->error;
    echo json_encode($response);
    exit;
}
if (empty($id_tipo_usuario)) {
    $response['error'] = "No se encontró id_tipo_usuario para el usuario proporcionado.";
    echo json_encode($response);
    exit;
}
$sql_casa = "SELECT id_manzana, id_casa FROM casas WHERE id_grupo_familiar = ?";
$stmt_casa = $conn->prepare($sql_casa);
if ($stmt_casa) {
    $stmt_casa->bind_param("i", $grupo_familiar_id);
    $stmt_casa->execute();
    $stmt_casa->bind_result($id_manzana, $id_casa);
    $stmt_casa->fetch();
    $stmt_casa->close();
} else {
    $response['error'] = "Error en la preparación de la consulta para obtener id_casa e id_manzana: " . $conn->error;
    echo json_encode($response);
    exit;
}
if (empty($id_casa)) {
    $response['error'] = "No se encontró id_casa para el grupo familiar proporcionado.";
    echo json_encode($response);
    exit;
}
$sql_verificar = "SELECT COUNT(*) FROM historicos_beneficios 
                  WHERE id_grupo_flia = ? AND id_beneficio = ? AND DATE(fecha) = CURDATE()";
$stmt_verificar = $conn->prepare($sql_verificar);
if ($stmt_verificar) {
    $stmt_verificar->bind_param("ii", $grupo_familiar_id, $beneficio_id);
    $stmt_verificar->execute();
    $stmt_verificar->bind_result($count);
    $stmt_verificar->fetch();
    $stmt_verificar->close(); 
    if ($count > 0) {
        $response['error'] = "Este beneficio ya ha sido entregado a este grupo familiar.";
        echo json_encode($response);
        exit;
    }
} else {
    $response['error'] = "Error en la preparación de la consulta de verificación: " . $conn->error;
    echo json_encode($response);
    exit;
}
$sql = "INSERT INTO historicos_beneficios (id_usuario, id_tipo_usuario, id_grupo_flia, id_manzana, id_casa, id_beneficio, fecha, descripcion, observacion, status) 
VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?)";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $status = 'Entregado';
    $stmt->bind_param("iiiisssss", $id_usuario, $id_tipo_usuario, $grupo_familiar_id, $id_manzana, $id_casa, $beneficio_id, $descripcion, $observacion, $status);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error al procesar la entrega.";
    }
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta de inserción: " . $conn->error;
}
$conn->close();
echo json_encode($response);
?>