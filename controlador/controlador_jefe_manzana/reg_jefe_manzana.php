<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$cedula = $_POST['cedula'][0];
$correo = $_POST['correo'][0];
$id_grupo_flia = $_POST['id_grupo_flia'];
$tipo_cedula = $_POST['tipo_cedula'][0];
$p_n_jefefamilia = $_POST['p_n_jefefamilia'];
$s_n_jefefamilia = $_POST['s_n_jefefamilia'];
$p_a_jefefamilia = $_POST['p_a_efefamilia'];
$s_a_jefefamilia = $_POST['s_a_jefefamilia'];
$parentesco = $_POST['parentesco'][0];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$serial = $_POST['serial'][0];
$codigo_carnet_patria = $_POST['carnet'][0];
$genero = $_POST['genero'][0];
$telefono = $_POST['telefono'][0];
$numero_hijos = $_POST['numero_hijos'][0];
include 'conexion.php';
$sql = "INSERT INTO usuarios (usuario, contraseña, cedula, correo) VALUES ('$usuario', '$contraseña', '$cedula', '$correo')";
if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado correctamente";
} else {
    echo "Error al crear el registro de usuario: " . $conn->error;
}
$id_usuario = $conn->insert_id;
$sql_personas = "INSERT INTO personas (id_tipo_usuario, id_grupo_flia, tipo_cedula, cedula, numero_hijos, correo, parentesco, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, genero, telefono, serial_carnet_patria, codigo_carnet_patria) 
                VALUES ('$id_usuario', '$id_grupo_flia', '$tipo_cedula', '$cedula', '$numero_hijos', '$correo', '$parentesco', '$p_n_jefefamilia', '$s_n_jefefamilia', '$p_a_jefefamilia', '$s_a_jefefamilia', '$fecha_nacimiento', '$genero', '$telefono', '$serial', '$codigo_carnet_patria' )";
if ($conn->query($sql_personas) === TRUE) {
    echo " Nuevo registro de persona creado correctamente";
    $sql_tipos_usuarios = "INSERT INTO tipos_usuarios (id_usuario, tipo, cedula, status) VALUES ('$id_usuario', 'Jefe Manzana', '$cedula', 'Activo')";
    if ($conn->query($sql_tipos_usuarios) === TRUE) {
        echo " Nuevo registro de tipo de usuario creado correctamente";
    } else {
        echo "Error al crear el registro de tipo de usuario: " . $conn->error;
    }
    header("location: ../../php/jefe_manzana.php");
} else {
    echo "Error al crear el registro de persona: " . $conn->error;
}
$conn->close();
?>