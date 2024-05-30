<?php require_once "vista_superior.php"; ?>
<title>Beneficios</title>
<link rel="stylesheet" type="text/css" href="../styles/jquery.dataTables.css">
<link rel="stylesheet" href="../styles/sweetalert2.min.css">
<script src="../scripts/sweetalert2.all.min.js"></script>
<style>
    #benefitsTable {
        width: 100%;
        border-collapse: collapse;
    }
    #benefitsTable th,
    #benefitsTable td {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 10px;
        font-size: 1em;
    }
    .dataTables_length select {
        color: black;
    }
    .dataTables_length label {
        color: black;
    }
    #benefitsTable tbody tr:hover {
        background-color:  #287bff !important;
        color: white;
    }
    #benefitsTable tbody tr:hover td {
        background-color:  #287bff !important;
        color: white !important;
    }
</style>
<div class="details section">
    <div class="recentRegisters">
    <div class="cardHeader">
    <h2>Beneficios</h2>
    <button id="btnRegistrarBeneficio" class="btn">Registrar Beneficio</button>
    <button id="btnBeneficioRegistrados" class="btn">Beneficios Registrados</button>
    <button id="btnRegistrarEntrega" class="btn">Registrar Entrega de Beneficio</button>
    </div>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>
    </br></br></br>
    <table id="benefitsTable" class="display">
        <thead>
            <tr>
                <th>Nombre del Beneficio</th>
                <th>Grupo Familiar</th>
                <th>Manzana</th>
                <th>N° de casa</th>
                <th>Fecha de Entrega</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              include  '../controlador/controlador_beneficio/control_beneficio.php'
            ?>
        </tbody>
    </table>
    </div>
</div>
<script src="../scripts/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="../scripts/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#benefitsTable').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        }); $('#btnRegistrarBeneficio').click(function() {
    Swal.fire({
        title: 'Registrar Beneficio',
        html: `<form id="formRegistrarBeneficio" action="../controlador/controlador_beneficio/reg_nuevo_beneficio.php" method="post">
                    <div class="input-box">
                        <label class="label" for="beneficio_nuevo">
                            <input type="text" class="input" placeholder="Nombre del Beneficio " id="beneficio_nuevo" name="beneficio_nuevo" required>
                        </label>
                    </div>
                    <button type="submit" name="RegistrarBeneficio" class="btn btn-primary">Registrar Beneficio</button>
                </form>`,
        showCancelButton: true,
        showConfirmButton: false,
        cancelButtonText: 'Cerrar',
        willOpen: () => {
            $('#formRegistrarBeneficio').submit(function(e) {
                e.preventDefault();
                let beneficio = $('#beneficio_nuevo').val();
                $.ajax({
                    type: 'POST',
                    url: $('#formRegistrarBeneficio').attr('action'),
                    data: { RegistrarBeneficio: true, beneficio_nuevo: beneficio },
                    dataType: 'json',
                    success: function(response) {
                        if (response.exists) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Ya existe un beneficio con el mismo nombre',
                            });
                        } else {
                            Swal.fire({
                                icon: 'question',
                                title: '¿Estás seguro?',
                                text: '¿Deseas registrar este beneficio?',
                                showCancelButton: true,
                                confirmButtonText: 'Sí',
                                cancelButtonText: 'No',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Registrado',
                                        text: 'El beneficio se ha registrado correctamente',
                                    }).then(() => { location.reload();
                                        $('#formRegistrarBeneficio').submit();
                                    });
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        }
    });
});
$('#btnRegistrarEntrega').click(function() {
    Swal.fire({
        title: 'Registrar Entrega de Beneficio',
        html: `<form id="formRegistrarEntrega" method="post">
                    <div class="input-box">
                        <label class="label" for="beneficio_id">
                            <select id="beneficio_id" name="beneficio_id" required>
                                <option value="">Seleccionar:</option>
                                <?php
                                include '../controlador/conexion.php';
                                $sql = "SELECT id_beneficio, nombre_beneficio FROM beneficios";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="' . htmlspecialchars($row['id_beneficio']) . '">' . htmlspecialchars($row['nombre_beneficio']) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <span class="label_name">Beneficio Entregado</span>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="grupo_familiar_id">
                            <label for="grupo_familiar_id">Seleccione un grupo familiar:</label>
                            <select id="grupo_familiar_id" name="grupo_familiar_id" required>
                                <option value="">Seleccionar:</option>
                                <?php
                                $sql = "SELECT id_grupo_flia, nombre_familia FROM grupos_familiares";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option value="' . htmlspecialchars($row['id_grupo_flia']) . '">' . htmlspecialchars($row['nombre_familia']) . '</option>';
                                    }
                                } else {
                                    echo '<option value="">No hay grupos familiares disponibles</option>';
                                }
                                ?>
                            </select>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="descripcion">
                            <input type="text" class="input" placeholder="Descripción " id="descripcion" name="descripcion" required>
                            
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="observacion">
                            <input type="text" class="input" placeholder="Observación " id="observacion" name="observacion" required>
                            
                        </label>
                    </div>
                    <input type="submit" name="RegistrarEntrega" value="Registrar Entrega">
                    </form>`,
                    showCancelButton: true,
        showConfirmButton: false,
        cancelButtonText: 'Cerrar',
        didOpen: () => {
            const form = document.getElementById('formRegistrarEntrega');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '../controlador/controlador_beneficio/entrega_beneficios.php',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function(response) {
                        console.log(response);
                        if (response.trim() === 'success') {
                            Swal.fire(
                                '¡Éxito!',
                                'La entrega se realizó correctamente.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                response,
                            ).then(() => {
                                location.reload();
                            });
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error',
                            'Ha ocurrido un error al comunicarse con el servidor.',
                            'error'
                        ).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        }
    });
});
$('#btnBeneficioRegistrados').click(function() {
            Swal.fire({
                title: 'Beneficios Registrados',
                html: `<table id="registeredBenefitsTable" class="display">
                        <thead>
                            <tr>
                                <th>Nombre del Beneficio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../controlador/conexion.php';
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT id_beneficio, nombre_beneficio FROM beneficios";
                            $result = $conn->query($sql);

                            if ($result === false) {
                                die("Error in SQL query: " . $conn->error);
                            }

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($row['nombre_beneficio']) . '</td>';
                                    echo '</tr>';
                                }
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>`,
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonText: 'Cerrar',
                didOpen: () => {
                    $('#registeredBenefitsTable').DataTable({
                        "language": {
                            "decimal": "",
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Entradas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Último",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    });
                    $('.deleteButton').click(function() {
                        var id = $(this).data('id');
                        Swal.fire({
                            title: '¿Estás seguro?',
                            text: "¡No podrás revertir esto!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Sí, eliminarlo!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '../controlador/controlador_beneficio/eliminar_beneficio.php',
                                    type: 'POST',
                                    data: { id: id },
                                    success: function(response) {
                                        if (response == 'success') {
                                            Swal.fire(
                                                'Eliminado!',
                                                'El beneficio ha sido eliminado.',
                                                'success'
                                            ).then(() => {
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire(
                                                'Error!',
                                                'Hubo un problema al eliminar el beneficio.',
                                                'error'
                                            );
                                        }
                                    }
                                });
                            }
                        });
                    });
                }
            });
        });
    });
</script>