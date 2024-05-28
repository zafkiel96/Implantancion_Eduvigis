<?php require_once "vista_superior.php"; ?>
<title>Habitantes</title>
<link rel="stylesheet" href="../styles/styles.css">
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
            <h2>Habitantes</h2>
            <button id="btnRegistrarJefeManzana" class="btn">Registrar Habitante</button>
            <section style="display: none;" class="details formulario formulario-Jefe_de_Manzana">
                <?php
                include  '../controlador/controlador_habitante/registro_habitantes.php'
                ?>
        </section>
        </div>
        </br>
        <table id="benefitsTable" class="display">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                  include  '../controlador/controlador_habitante/control_habitante.php'
                ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" charset="utf8" src="../scripts/jquery-3.6.0.min.js"></script>
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
        });
    });
    $(document).ready(function() {
         $('#btnRegistrarJefeManzana').click(function() {
            Swal.fire({
                title: 'Registrar Habitante',
                html: $('.formulario-Jefe_de_Manzana').html(),
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonText: 'Cerrar',
                customClass: {
                    cancelButton: 'swal-cancel-button'
                }
            });
        });
    }); 

   
</script>
