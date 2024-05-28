<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se recuperan los datos del formulario principal
    $grupo_familiar = $_POST['grupo_familiar'];
    $manzana = $_POST['manzana'];
    $direccion_vivienda = $_POST['direccion_vivienda'];
    $tenencia = $_POST['tenencia'];
    $numero_casa = $_POST['numero_casa'];
    $anexo = $_POST['anexo'];
    include 'db.php';

    // Paso 1: Insertar datos en la tabla grupos_familiares
    $sql_grupo_familiar = "INSERT INTO `grupos_familiares`(`Status`, `nombre_familia`) VALUES ('Activo', '$grupo_familiar')";
    if ($conn->query($sql_grupo_familiar) === TRUE) {
        // Obtener el ID del grupo familiar recién insertado
        $id_grupo_flia = $conn->insert_id;

        // Paso 2: Insertar datos en la tabla casas usando el ID del grupo familiar
        $sql_casa = "INSERT INTO `casas`(`id_manzana`, `id_grupo_familiar`, `numero_casa`, `anexo_casa`, `ten_casa`, `status`) 
                     VALUES ('$manzana', '$id_grupo_flia', '$numero_casa', '$anexo', '$tenencia', 'Activo')";

        if ($conn->query($sql_casa) === TRUE) {
            $id_casa = $conn->insert_id;
            echo "Datos de la casa almacenados correctamente";

            // Verificar si es jefe de familia
            if ($_POST['jefeFamilia'] == 'si') {
                // Insertar datos en la tabla usuarios_grupos_familiares
                $parentesco = $_POST['parentesco'][0]; // Suponiendo que el jefe de familia es el primer miembro en el formulario
                $sql_usuario_grupo_familiar = "INSERT INTO `usuarios_grupos_familiares`(`id_usuario_g_f`, `id_usuario`, `id_grupo_flia`, `id_casa`, `parentesco`, `jefe_familia`) 
                                               VALUES (NULL, '', '$id_grupo_flia', '$id_casa', '$parentesco', 'SI')";
                if ($conn->query($sql_usuario_grupo_familiar) === TRUE) {
                    echo "Datos del jefe de familia almacenados correctamente";

                    // Insertar datos en la tabla tipos_usuarios para el jefe de familia
                    $cedula_jefe_familia = $_POST['cedula'][0]; // Suponiendo que el jefe de familia es el primer miembro en el formulario
                    $sql_tipos_usuarios = "INSERT INTO `tipos_usuarios`(`id_tipo_usuario`, `id_usuario`, `cedula`, `tipo`, `fecha_registro`, `status`) 
                                           VALUES (NULL, '', '$cedula_jefe_familia', '', NOW(), '')";
                    if ($conn->query($sql_tipos_usuarios) === TRUE) {
                        echo "Datos del tipo de usuario del jefe de familia almacenados correctamente";
                    } else {
                        echo "Error al insertar datos del tipo de usuario del jefe de familia: " . $conn->error;
                    }
                } else {
                    echo "Error al insertar datos del jefe de familia en la tabla usuarios_grupos_familiares: " . $conn->error;
                }
            }

            // Paso 3: Insertar datos de los miembros de la familia
            if (isset($_POST['nombre']) && is_array($_POST['nombre'])) {
                // Preparar y ejecutar las consultas para insertar cada miembro
                $stmt = $conn->prepare("INSERT INTO `personas`(`id_tipo_usuario`, `tipo_cedula`, `cedula`, `numero_hijos`, `id_grupo_flia`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `parentesco`, `genero`, `telefono`, `correo`, `serial_carnet_patria`, `codigo_carnet_patria`, `fecha_registro`, `status`) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), 'Activo')");

                if ($stmt === FALSE) {
                    die("Error preparing statement: " . $conn->error);
                }

                $stmt->bind_param("ssssssssssssssss", $id_tipo_usuario, $tipo_cedula, $cedula, $numero_hijos, $id_grupo_flia, $nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $parentescos, $genero, $telefono, $correo, $serial, $codigo);

                foreach ($_POST['nombre'] as $index => $nombre) {
                    $id_tipo_usuario = ''; // Puedes ajustar este valor según tu aplicación
                    $tipo_cedula = isset($_POST['tipo_documento'][$index]) ? $_POST['tipo_documento'][$index] : null;
                    $cedula = isset($_POST['cedula'][$index]) ? $_POST['cedula'][$index] : null;
                    $numero_hijos = isset($_POST['numero_hijos'][$index]) ? $_POST['numero_hijos'][$index] : null;
                    $nombre = isset($_POST['nombre'][$index]) ? $_POST['nombre'][$index] : null;
                    $segundo_nombre = isset($_POST['segundo_nombre'][$index]) ? $_POST['segundo_nombre'][$index] : null;
                    $primer_apellido = isset($_POST['apellidos'][$index]) ? $_POST['apellidos'][$index] : null;
                    $segundo_apellido = isset($_POST['segundo_apellido'][$index]) ? $_POST['segundo_apellido'][$index] : null;
                    $fecha_nacimiento = isset($_POST['fecha_nacimiento'][$index]) ? $_POST['fecha_nacimiento'][$index] : null;
                    $parentescos = isset($_POST['parentesco'][$index]) ? $_POST['parentesco'][$index] : null;
                    $genero = isset($_POST['genero'][$index]) ? $_POST['genero'][$index] : null;
                    $telefono = isset($_POST['telefono'][$index]) ? $_POST['telefono'][$index] : null;
                    $correo = isset($_POST['correo'][$index]) ? $_POST['correo'][$index] : null;
                    $serial = isset($_POST['serial'][$index]) ? $_POST['serial'][$index] : null;
                    $codigo = isset($_POST['carnet'][$index]) ? $_POST['carnet'][$index] : null;

                    // Verificar que todos los campos obligatorios están presentes


                    // Ejecutar la consulta
                    if ($stmt->execute() === TRUE) {
                        echo "Datos de la persona almacenados correctamente";
                    } else {
                        echo "Error al almacenar datos de la persona: " . $stmt->error;
                    }
                }

                // Cerrar la consulta preparada
                $stmt->close();
            } else {
                echo "Error: No se han proporcionado datos de los miembros de la familia.";
            }
        } else {
            echo "Error al almacenar datos de la casa: " . $conn->error;
        }
    } else {
        echo "Error al almacenar datos del grupo familiar: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>



