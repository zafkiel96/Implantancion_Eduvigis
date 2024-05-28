<link rel="stylesheet" href="../styles/styles.css">
<link rel="stylesheet" type="text/css" href="../styles/jquery.dataTables.css">
<link rel="stylesheet" href="../styles/sweetalert2.min.css">
<script src="../scripts/sweetalert2.all.min.js"></script>
<script type="text/javascript" charset="utf8" src="../scripts/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="../scripts/jquery.dataTables.js"></script>
<?php

include '../controlador/conexion.php';
$sql = "SELECT id_persona, primer_nombre, primer_apellido, cedula, fecha_nacimiento, telefono FROM personas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['primer_nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($row['primer_apellido']) . "</td>";
        echo "<td>" . htmlspecialchars($row['cedula']) . "</td>";
        echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
        echo "<td>  
                    <button class='btn-ver' onclick=\"verDatos(" . htmlspecialchars($row['id_persona']) . ")\"><i class='bx bx-show'></i> Ver</button>
                    <button class='btn-editar' onclick=\"editarRegistro(" . htmlspecialchars($row['id_persona']) . ")\"><i class='bx bx-edit'></i> Editar</button>
                    <button class='btn-eliminar' onclick=\"eliminarRegistro(" . htmlspecialchars($row['id_persona']) . ")\"><i class='bx bx-trash'></i> Eliminar</button>
                </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No se encontraron registros</td></tr>";
}
$conn->close();

?>

