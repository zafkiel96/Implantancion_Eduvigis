<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'fetch') {
        $sql = "SELECT m.id_manzana, m.numero_manzana, 
                       COUNT(c.id_casa) AS num_casas, 
                       COUNT(DISTINCT c.id_grupo_familiar) AS num_grupos,
                       CONCAT(p.primer_nombre, ' ', p.primer_apellido) AS jefe_manzana
                FROM manzanas m
                LEFT JOIN casas c ON m.id_manzana = c.id_manzana
                LEFT JOIN usuarios u ON m.id_jefe_manzana = u.id_usuario
                LEFT JOIN personas p ON u.cedula = p.cedula
                GROUP BY m.id_manzana";
        $result = $conn->query($sql);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    } elseif ($action == 'get_casas') {
        $id_manzana = $_POST['id_manzana'];
        $sql = "SELECT c.numero_casa, g.nombre_familia, c.ten_casa, c.status 
                FROM casas c 
                JOIN grupos_familiares g ON c.id_grupo_familiar = g.id_grupo_flia 
                WHERE c.id_manzana = $id_manzana";
        $result = $conn->query($sql);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    } elseif ($action == 'get_jefes') {
        $sql = "SELECT u.id_usuario, p.primer_nombre, p.primer_apellido, u.cedula 
                FROM usuarios u
                JOIN personas p ON u.cedula = p.cedula
                JOIN tipos_usuarios tu ON u.id_usuario = tu.id_usuario
                WHERE tu.tipo = 'Jefe Manzana' AND tu.status = 'Activo' AND u.status = 'Activo'";
        $result = $conn->query($sql);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    } elseif ($action == 'add_jefe') {
        $id_manzana = $_POST['id_manzana'];
        $id_usuario = $_POST['id_usuario'];

        $sql = "SELECT COUNT(*) AS count FROM manzanas 
                WHERE id_jefe_manzana = $id_usuario";
        $result = $conn->query($sql);
        $count = $result->fetch_assoc()['count'];

        if ($count < 2) {
            $sql = "UPDATE manzanas SET id_jefe_manzana = $id_usuario WHERE id_manzana = $id_manzana";
            if ($conn->query($sql) === TRUE) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => $conn->error]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No puede haber más de 2 jefes de manzana']);
        }
    } elseif ($action == 'register_manzana') {
        $numero_manzana = $_POST['numero_manzana'];
        $descripcion = $_POST['descripcion'];
        $observacion = $_POST['observacion'];

        $sql = "INSERT INTO manzanas (numero_manzana, descripcion, observacion) 
                VALUES ($numero_manzana, '$descripcion', '$observacion')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => $conn->error]);
        }
    }
}
?>