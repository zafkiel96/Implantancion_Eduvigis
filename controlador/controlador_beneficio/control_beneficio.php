<?php
    include '../controlador/conexion.php';
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

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['nombre_beneficio']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['nombre_familia']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['numero_manzana']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['numero_casa']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['fecha']) . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No se encontraron registros.</td></tr>';
                }

            $conn->close();
?>
