<?php require_once "vista_superior.php"; ?>
<html lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manzanas</title>
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
        .view {
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
        #registerManzana {
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
            width: 15%;
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
        <h1>Manzanas</h1>
        <div>
        <?php if ($tipo_usuario != 'Jefe Manzana') : ?>
        <button id="registerManzana">Registrar +</button>
        <?php endif; ?>
        <table id="manzanasTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Número Manzana</th>
                    <th>Número de Casas</th>
                    <th>Número de Grupos Familiares</th>
                    <th>Jefe de Manzana</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script>
    $(document).ready(function() {
        var table = $('#manzanasTable').DataTable({
            "ajax": {
                "url": "crlmanzanas.php",
                "type": "POST",
                "data": { action: 'fetch' },
                "dataSrc": ""
            },
            "columns": [
                { "data": "numero_manzana" },
                { "data": "num_casas" },
                { "data": "num_grupos" },
                { "data": "jefe_manzana" },
                { "data": null, "defaultContent": '<button class="view"><i class="bx bx-show"></i> Ver Datos</button> <?php if ($tipo_usuario != 'Jefe Manzana') : ?><button class="add"><i class="bx bx-user-plus"></i> Añadir Jefe</button><?php endif; ?>' }
            ],
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
            },
        });

        
    $('#manzanasTable tbody').on('click', 'button.view', function () {
        var data = table.row($(this).parents('tr')).data();
        $.ajax({
            url: 'crlmanzanas.php',
            type: 'POST',
            data: {
                action: 'get_casas',
                id_manzana: data.id_manzana
            },
            success: function(response) {
                var casas = JSON.parse(response);
                var casasHtml = '<div id="casasContainer">';
                casasHtml += '<table>';
                casasHtml += '<tr><th>Número de Casa</th><th>Grupo Familiar</th><th>Tenencia</th><th>Status</th></tr>';
                casas.forEach(function(casa) {
                    casasHtml += '<tr>';
                    casasHtml += '<td>' + casa.numero_casa + '</td>';
                    casasHtml += '<td>' + casa.nombre_familia + '</td>';
                    casasHtml += '<td>' + casa.ten_casa + '</td>';
                    casasHtml += '<td>' + casa.status + '</td>';
                    casasHtml += '</tr>';
                });
                casasHtml += '</table></div>';
                Swal.fire({
                    title: 'Casas en la Manzana ' + data.numero_manzana,
                    html: casasHtml,
                    allowOutsideClick: false
                });
            }
        });
    });


        $('#manzanasTable tbody').on('click', 'button.add', function () {
            var data = table.row($(this).parents('tr')).data();
            $.ajax({
                url: 'crlmanzanas.php',
                type: 'POST',
                data: {
                    action: 'get_jefes'
                },
                success: function(response) {
                    var jefes = JSON.parse(response);
                    var options = '';
                    jefes.forEach(function(jefe) {
                        options += '<option value="' + jefe.id_usuario + '">' + jefe.cedula + ' - ' + jefe.primer_nombre + ' ' + jefe.primer_apellido + '</option>';
                    });
                    Swal.fire({
                        title: 'Añadir Jefe de Manzana',
                        html: '<select id="jefeSelect">' + options + '</select>',
                        showCancelButton: true,
                        allowOutsideClick: false,
                        confirmButtonText: 'Añadir',
                        preConfirm: () => {
                            const id_usuario = Swal.getPopup().querySelector('#jefeSelect').value;
                            return { id_usuario: id_usuario };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'crlmanzanas.php',
                                type: 'POST',
                                data: {
                                    action: 'add_jefe',
                                    id_manzana: data.id_manzana,
                                    id_usuario: result.value.id_usuario
                                },
                                success: function(response) {
                                    var result = JSON.parse(response);
                                    if (result.status === 'success') {
                                        Swal.fire('Jefe añadido con éxito', '', 'success');
                                        table.ajax.reload();
                                    } else {
                                        Swal.fire('Error', result.message, 'error');
                                    }
                                }
                            });
                        }
                    });
                }
            });
        });

        $('#registerManzana').on('click', function () {
            Swal.fire({
                title: 'Registrar Nueva Manzana',
                html: `
                    <input id="numero_manzana" class="swal2-input" placeholder="Número Manzana">
                    <input id="descripcion" class="swal2-input" placeholder="Descripción">
                    <input id="observacion" class="swal2-input" placeholder="Observación">
                `,
                showCancelButton: true,
                confirmButtonText: 'Registrar',
                allowOutsideClick: false,
                preConfirm: () => {
                    const numero_manzana = Swal.getPopup().querySelector('#numero_manzana').value;
                    const descripcion = Swal.getPopup().querySelector('#descripcion').value;
                    const observacion = Swal.getPopup().querySelector('#observacion').value;
                    if (!numero_manzana || !descripcion || !observacion) {
                        Swal.showValidationMessage(`Por favor complete todos los campos`);
                    }
                    return { numero_manzana: numero_manzana, descripcion: descripcion, observacion: observacion };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'crlmanzanas.php',
                        type: 'POST',
                        data: {
                            action: 'register_manzana',
                            numero_manzana: result.value.numero_manzana,
                            descripcion: result.value.descripcion,
                            observacion: result.value.observacion
                        },
                        success: function(response) {
                            var result = JSON.parse(response);
                            if (result.status === 'success') {
                                Swal.fire('Manzana registrada con éxito', '', 'success');
                                table.ajax.reload();
                            } else {
                                Swal.fire('Error', result.message, 'error');
                            }
                        }
                    });
                }
            });
        });
    });

</script>
</section>