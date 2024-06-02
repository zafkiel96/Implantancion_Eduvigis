<?php require_once "vista_superior.php"; ?>
<title>Beneficios</title>
<html lang="es">
<link rel="stylesheet" href="../../styles/styles.css">
    <link rel="stylesheet" type="text/css" href="../../styles/jquery.dataTables.css">
    <link rel="stylesheet" href="../../styles/sweetalert2.min.css">
    <script src="../scripts/sweetalert2.all.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../../scripts/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../../scripts/jquery.dataTables.js"></script>
<style>
    .dataTables_wrapper .dataTables_length select {
    border: 1px solid #aaa;
    border-radius: 3px;
    padding: 5px;
    background-color: #287bff;
    padding: 4px;}
    .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
        }
        .custom-table th,
        .custom-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .custom-table th {
            background-color: #f2f2f2;
        }
        .custom-btn {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        #btnMostrarBeneficios {
            background-color: #287bff;
            border: none;
            color: white;
            padding: 10px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 12px;
            transition: background-color 0.3s ease;
            border: 1px solid black;
        }
        .add {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 12px;
            transition: background-color 0.3s ease;
            border: 1px solid black;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            margin: 0 5px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            color: #333;
            cursor: pointer;
            text-align: center; 
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #007bff;
            color: black;
            border: 1px solid #007bff;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #e9ecef;
            color:black;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            cursor: default;
            background-color: #eee;
            color: #aaa;
            border: 1px solid #ddd;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:not(.current):hover {
            background-color: black
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            font-weight: bold;
            color:black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
         #editForm label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        #editForm input,
        #editForm select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        #editForm input:focus,
        #editForm select:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }
        #editForm button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #editForm button:hover {
            background-color: #45a049;
        }
        #registerForm label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        #registerForm input,
        #registerForm select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        #registerForm input:focus,
        #registerForm select:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }
        #registerForm button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #registerForm button:hover {
            background-color: #45a049;
        }
        #btnRegistrarBeneficio, #btnRegistrarEntrega {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
            transition: background-color 0.3s ease;
            width: 17%;
            border: 1px solid black;
        }
        #registerBtn:hover {
            background-color: #45a049;
        }
        table.DataTable {
            width: 100%;
            margin: 0 auto;
            color: black !important;
        }
        table.dataTables_length, .dataTables_info {
            color: black;
        }
        table.DataTable-hover tbody tr:hover {
            color: black !important;
        }
        table.DataTable-hover {
            color: black !important;
        }
        table.dataTable td {
    text-align: center!important;  
}
table.dataTable tbody tr:hover td{
    background-color: #287bff !important;
    cursor: pointer;
}

.custom-modal-class {
    max-width: 45%;
}
</style>
<div class="details section">
    <div class="recentRegisters">
    <h1>Histórico de Beneficios</h1>
    <div class="button-container">
        <button id="btnRegistrarBeneficio">Registrar Beneficio</button>
        <button id="btnMostrarBeneficios">Mostrar Beneficios Registrados</button>
        <button id="btnRegistrarEntrega">Registrar Entrega</button>
    </div>
    <div id="contenedorTablas"></div>
    <table id="tablaHistorico" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nombre Beneficio</th>
                <th>Nombre Familia</th>
                <th>Número Manzana</th>
                <th>Número Casa</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
      $(document).ready(function() {
    var table = $('#tablaHistorico').DataTable({
        "ajax": "crlbeneficio.php?accion=mostrar_historico",
        "columns": [
            { "data": "nombre_beneficio" },
            { "data": "nombre_familia" },
            { "data": "numero_manzana" },
            { "data": "numero_casa" },
            { "data": "fecha" }
        ],"language": {
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
            },
    });

    $('#btnRegistrarBeneficio').on('click', function() {
        Swal.fire({
            title: 'Registrar Beneficio',
            input: 'text',
            inputLabel: 'Nombre del Beneficio',
            inputPlaceholder: 'Ingrese el nombre del beneficio',
            showCancelButton: true,
            confirmButtonText: 'Registrar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('crlbeneficio.php', {
                    accion: 'registrar_beneficio',
                    nombre_beneficio: result.value
                }, function(response) {
                    if (response.success) {
                        Swal.fire('Registrado', 'El beneficio ha sido registrado.', 'success');
                    } else if (response.exists) {
                        Swal.fire('Error', 'El beneficio ya existe.', 'error');
                    } else {
                        Swal.fire('Error', response.error, 'error');
                    }
                }, 'json');
            }
        });
    });

    $('#btnMostrarBeneficios').on('click', function() {
        Swal.fire({
            title: 'Beneficios Registrados',
            html: '<table id="tablaBeneficios" class="display" style="width:100%">' +
                '<thead><tr><th>Nombre Beneficio</th></tr></thead><tbody></tbody></table>',
            didOpen: function() {
                $('#tablaBeneficios').DataTable({
                    "ajax": "crlbeneficio.php?accion=mostrar_beneficios",
                    "columns": [
                        { "data": "nombre_beneficio" }
                    ],"language": {
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
            },
                });
            },
            width: '600px'
        });
    });

    $('#btnRegistrarEntrega').on('click', function() {
        Swal.fire({
            title: 'Registrar Entrega',
            html: `
                <select id="selectGrupo" class="swal2-input">
                    <option value="">Seleccionar Grupo Familiar</option>
                    <!-- Opciones dinámicas -->
                </select>
                <select id="selectBeneficio" class="swal2-input">
                    <option value="">Seleccionar Beneficio</option>
                    <!-- Opciones dinámicas -->
                </select>
                <textarea id="descripcion" class="swal2-textarea" placeholder="Descripción"></textarea>
                <textarea id="observacion" class="swal2-textarea" placeholder="Observación"></textarea>
            `,
            showCancelButton: true,
            confirmButtonText: 'Registrar',
            cancelButtonText: 'Cancelar',
            didOpen: function() {
                $.getJSON('crlbeneficio.php?accion=obtener_grupos', function(data) {
                    $.each(data, function(key, value) {
                        $('#selectGrupo').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                    });
                });
                $.getJSON('crlbeneficio.php?accion=obtener_beneficios', function(data) {
                    $.each(data, function(key, value) {
                        $('#selectBeneficio').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                    });
                });
            },
            preConfirm: function() {
                return new Promise((resolve) => {
                    resolve({
                        grupo: $('#selectGrupo').val(),
                        beneficio: $('#selectBeneficio').val(),
                        descripcion: $('#descripcion').val(),
                        observacion: $('#observacion').val()
                    });
                });
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('crlbeneficio.php', {
                    accion: 'registrar_entrega',
                    grupo: result.value.grupo,
                    beneficio: result.value.beneficio,
                    descripcion: result.value.descripcion,
                    observacion: result.value.observacion
                }, function(response) {
                    if (response.success) {
                        Swal.fire('Registrado', 'La entrega ha sido registrada.', 'success');
                        table.ajax.reload();
                    } else {
                        Swal.fire('Error', response.error, 'error');
                    }
                }, 'json');
            }
        });
    });
});
</script>