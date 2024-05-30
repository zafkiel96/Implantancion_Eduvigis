<?php require_once "vista_superior.php"?>
<title>Dashboard</title>
<style>
    @media (max-width: 1200px) {
        .cardBox {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    @media (max-width: 992px) {
        .cardBox {
            grid-template-columns: repeat(2, 1fr);
        }

        .detailsContainer {
            grid-template-columns: 1fr;
        }
    }
    @media (max-width: 768px) {
        .cardBox {
            grid-template-columns: 1fr;
        }
    }
    @media (max-width: 576px) {
        .card, .details, .recentBeneficios {
            padding: 10px;
        }
        .card .numbers {
            font-size: 1.5em;
        }
        .card .cardName {
            font-size: 1em;
        }
        .card .iconBox {
            font-size: 2em;
        }
        .details .cardHeader h2, .recentBeneficios .cardHeader h2 {
            font-size: 1.2em;
        }
        .recentBeneficios table h4 {
            font-size: 0.9em;
        }
        .recentBeneficios table span {
            font-size: 0.8em;
        }
    }
</style>
<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers"><?php include '../controlador/controlador_dashboard/numhabitantes.php'; ?></div>
            <div class="cardName">Habitantes</div>
        </div>
        <div class="iconBox">
            <i class="fa-solid fa-users"></i>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="numbers"><?php include '../controlador/controlador_dashboard/casas.php'; ?></div>
            <div class="cardName">Casas</div>
        </div>
        <div class="iconBox">
            <i class="fa-solid fa-house-circle-check"></i>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="numbers"><?php include '../controlador/controlador_dashboard/familias.php'; ?></div>
            <div class="cardName">Familias</div>
        </div>
        <div class="iconBox">
            <i class="fa-solid fa-people-group"></i>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="numbers"><?php include '../controlador/controlador_dashboard/beneficios.php'; ?></div>
            <div class="cardName">Beneficios</div>
        </div>
        <div class="iconBox">
            <i class="fa-solid fa-box-open"></i>
        </div>
    </div>
</div>
<div class="detailsContainer">
    <div class="details">
    <script src="../scripts/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../scripts/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="../styles/jquery.dataTables.css">
    <link rel="stylesheet" href="../styles/estilosdatatables.css">
    <div class="cardHeader">
            <h2 style="color: #287bff">Últimos Habitantes Registrados</h2>
        </div>
        <table id="recentRegistersTable" class="display">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../controlador/conexion.php';
                $sql = "SELECT primer_nombre, primer_apellido, cedula, status FROM personas ORDER BY id_persona DESC LIMIT 10";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['primer_nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['primer_apellido']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cedula']) . "</td>";
                        echo "<td><span class='status " . htmlspecialchars($row['status']) . "'>" . htmlspecialchars($row['status']) . "</span></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron registros</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    <script>
        $(document).ready(function() {
            $('#recentRegistersTable').DataTable({
                "language": {
                    "zeroRecords": "No se encontraron registros",
                    "info": "",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "paging": false,
                "searching": false,
            });
        });
    </script>
    </div>
    <div class="recentBeneficios">
    <table class="mapa">
                <div class="cardHeader">
                    <h2 style="color: #287bff">Mapa</h2>
                </div>
            <iframe class="mapa1"src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2351.358949731758!2d-69.45901966046247!3d10.023483632492718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses-419!2sco!4v1715788727892!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </table>
    </div>
</div>