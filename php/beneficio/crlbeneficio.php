<?php
include 'conexion.php';

$accion = isset($_GET['accion']) ? $_GET['accion'] : $_POST['accion'];

if ($accion == 'mostrar_historico') {
    $sql = "SELECT 
                hb.fecha, 
                gf.nombre_familia, 
                m.numero_manzana,
                c.numero_casa,
                b.nombre_beneficio
            FROM 
                historicos_beneficios hb
            JOIN 
                grupos_familiares gf ON hb.id_grupo_flia = gf.id_grupo_flia
            JOIN 
                casas c ON hb.id_casa = c.id_casa  
            JOIN 
                manzanas m ON c.id_manzana = m.id_manzana
            JOIN 
                beneficios b ON hb.id_beneficio = b.id_beneficio
            ORDER BY 
                hb.fecha DESC";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    echo json_encode(['data' => $data]);
}

if ($accion == 'mostrar_beneficios') {
    $sql = "SELECT nombre_beneficio FROM beneficios";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    echo json_encode(['data' => $data]);
}

if ($accion == 'obtener_grupos') {
    $sql = "SELECT id_grupo_flia as id, nombre_familia as nombre FROM grupos_familiares";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    echo json_encode($data);
}

if ($accion == 'obtener_beneficios') {
    $sql = "SELECT id_beneficio as id, nombre_beneficio as nombre FROM beneficios";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    echo json_encode($data);
}

if ($accion == 'registrar_beneficio') {
    $nombre_beneficio = $_POST['nombre_beneficio'];
    $sql = "SELECT COUNT(*) AS count FROM beneficios WHERE nombre_beneficio = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombre_beneficio);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo json_encode(['exists' => true]);
    } else {
        $sql_insert = "INSERT INTO beneficios (nombre_beneficio, status) VALUES (?, 'Activo')";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("s", $nombre_beneficio);
        if ($stmt_insert->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Error al registrar el beneficio.']);
        }
        $stmt_insert->close();
    }
    $conn->close();
}

if ($accion == 'registrar_entrega') {
    session_start();
    $response = array();
    if (!isset($_SESSION['user_id'])) {
        $response['error'] = "Acceso no autorizado.";
        echo json_encode($response);
        exit;
    }
    $id_usuario = $_SESSION['user_id'];
    $beneficio_id = $_POST['beneficio'];
    $grupo_familiar_id = $_POST['grupo'];
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $observacion = $conn->real_escape_string($_POST['observacion']);

    $sql_tipo_usuario = "SELECT id_tipo_usuario FROM tipos_usuarios WHERE id_usuario = ?";
    $stmt_tipo_usuario = $conn->prepare($sql_tipo_usuario);
    $stmt_tipo_usuario->bind_param("i", $id_usuario);
    $stmt_tipo_usuario->execute();
    $stmt_tipo_usuario->bind_result($id_tipo_usuario);
    $stmt_tipo_usuario->fetch();
    $stmt_tipo_usuario->close();

    $sql_casa = "SELECT id_manzana, id_casa FROM casas WHERE id_grupo_familiar = ?";
    $stmt_casa = $conn->prepare($sql_casa);
    $stmt_casa->bind_param("i", $grupo_familiar_id);
    $stmt_casa->execute();
    $stmt_casa->bind_result($id_manzana, $id_casa);
    $stmt_casa->fetch();
    $stmt_casa->close();

    $sql_verificar = "SELECT COUNT(*) FROM historicos_beneficios WHERE id_grupo_flia = ? AND id_beneficio = ? AND DATE(fecha) = CURDATE()";
    $stmt_verificar = $conn->prepare($sql_verificar);
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

    $sql = "INSERT INTO historicos_beneficios (id_grupo_flia, id_manzana, id_casa, id_beneficio, fecha, descripcion, observacion, status) 
            VALUES (?, ?, ?, ?, NOW(), ?, ?, 'Entregado')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiss", $grupo_familiar_id, $id_manzana, $id_casa, $beneficio_id, $descripcion, $observacion);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al procesar la entrega.']);
    }
    $stmt->close();
    $conn->close();
}
?>