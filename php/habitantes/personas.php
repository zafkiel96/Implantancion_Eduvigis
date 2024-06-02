<?php require_once "vista_superior.php"; ?>
<html lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitantes</title>
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
        .viewBtn {
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
        .editBtn {
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
        #addPersonBtn {
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
</style>
    <div class="details section">
        <div class="recentRegisters">
            <h2>Habitantes</h2>
            <button id="addPersonBtn">Registrar +</button>
    <table id="personasTable" class="display">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula</th>
                <th>Teléfono</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>

    <script>
        
                
            $(document).ready(function() {
    var table = $('#personasTable').DataTable({
        ajax: {
            url: 'habitantes.php',
            type: 'POST',
            data: { action: 'fetchAll' },
            dataSrc: ''
        },
        columns: [
            { data: 'primer_nombre' },
            { data: 'primer_apellido' },
            { data: 'cedula' },
            { data: 'telefono' },
            { data: 'status' },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <button class="viewBtn" data-id="${row.id_persona}">Ver</button>
                        <button class="editBtn" data-id="${row.id_persona}">Editar</button>
                    `;
                }
            }
        ],
        language: {
            decimal: "",
            emptyTable: "No hay información",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
            infoFiltered: "(Filtrado de _MAX_ total entradas)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ Entradas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "Sin resultados encontrados",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        }
    });

    function getFormHtml(data = {}) {
        return `
            <input type="text" id="primer_nombre" class="swal2-input" placeholder="Primer Nombre" value="${data.primer_nombre || ''}" required pattern="[A-Za-zÁ-ÿ\\s]*" maxlength="30" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\\s]/g, '');">
            <input type="text" id="segundo_nombre" class="swal2-input" placeholder="Segundo Nombre" value="${data.segundo_nombre || ''}" pattern="[A-Za-zÁ-ÿ\\s]*" maxlength="30" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\\s]/g, '');">
            <input type="text" id="primer_apellido" class="swal2-input" placeholder="Primer Apellido" value="${data.primer_apellido || ''}" required pattern="[A-Za-zÁ-ÿ\\s]*" maxlength="30" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\\s]/g, '');">
            <input type="text" id="segundo_apellido" class="swal2-input" placeholder="Segundo Apellido" value="${data.segundo_apellido || ''}" pattern="[A-Za-zÁ-ÿ\\s]*" maxlength="30" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\\s]/g, '');">
            <select id="tipo_cedula" class="swal2-input">
                <option value="Venezolano" ${data.tipo_cedula === 'Venezolano' ? 'selected' : ''}>Venezolano</option>
                <option value="Extranjero" ${data.tipo_cedula === 'Extranjero' ? 'selected' : ''}>Extranjero</option>
                <option value="Juridico" ${data.tipo_cedula === 'Juridico' ? 'selected' : ''}>Juridico</option>
            </select>
            <input type="text" id="cedula" class="swal2-input" placeholder="Cédula" value="${data.cedula || ''}" required pattern="\\d*" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            <input type="text" id="serial_carnet_patria" class="swal2-input" placeholder="Serial Carnet Patria" value="${data.serial_carnet_patria || ''}" pattern="\\d*" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            <input type="text" id="codigo_carnet_patria" class="swal2-input" placeholder="Código Carnet Patria" value="${data.codigo_carnet_patria || ''}" pattern="\\d*" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            <select id="genero" class="swal2-input">
                <option value="Hombre" ${data.genero === 'Hombre' ? 'selected' : ''}>Hombre</option>
                <option value="Mujer" ${data.genero === 'Mujer' ? 'selected' : ''}>Mujer</option>
                <option value="Otro" ${data.genero === 'Otro' ? 'selected' : ''}>Otro</option>
            </select>
            <input type="date" id="fecha_nacimiento" class="swal2-input" value="${data.fecha_nacimiento || ''}" required>
            <input type="text" id="telefono" class="swal2-input" placeholder="Teléfono" value="${data.telefono || ''}" pattern="\\d*" maxlength="11">
            <input type="email" id="correo" class="swal2-input" placeholder="Correo" value="${data.correo || ''}">
            <select id="parentesco" class="swal2-input">
                <option value="Padre" ${data.parentesco === 'Padre' ? 'selected' : ''}>Padre</option>
                <option value="Madre" ${data.parentesco === 'Madre' ? 'selected' : ''}>Madre</option>
                <option value="Hijo(a)" ${data.parentesco === 'Hijo(a)' ? 'selected' : ''}>Hijo(a)</option>
                <option value="Hermano(a)" ${data.parentesco === 'Hermano(a)' ? 'selected' : ''}>Hermano(a)</option>
                <option value="Suegro(a)" ${data.parentesco === 'Suegro(a)' ? 'selected' : ''}>Suegro(a)</option>
                <option value="Yerno" ${data.parentesco === 'Yerno' ? 'selected' : ''}>Yerno</option>
                <option value="Nuera" ${data.parentesco === 'Nuera' ? 'selected' : ''}>Nuera</option>
            </select>
            <input type="number" id="numero_hijos" class="swal2-input" placeholder="Número de Hijos" value="${data.numero_hijos || ''}">
            <select id="status" class="swal2-input">
                <option value="Activo" ${data.status === 'Activo' ? 'selected' : ''}>Activo</option>
                <option value="Inactivo" ${data.status === 'Inactivo' ? 'selected' : ''}>Inactivo</option>
            </select>
        `;
    }

    $('#addPersonBtn').on('click', function() {
        Swal.fire({
            title: 'Registrar Persona',
            html: getFormHtml(),
            preConfirm: () => {
                let primer_nombre = $('#primer_nombre').val();
                let primer_apellido = $('#primer_apellido').val();
                let cedula = $('#cedula').val();
                let fecha_nacimiento = $('#fecha_nacimiento').val();

                if (!primer_nombre) {
                    Swal.showValidationMessage('Por favor ingrese su Primer Nombre');
                    return false;
                }
                if (!cedula) {
                    Swal.showValidationMessage('Por favor ingrese su cedula');
                    return false;
                }
                if (!primer_apellido) {
                    Swal.showValidationMessage('Por favor ingrese su Primer Apellido');
                    return false;
                }
                if (!fecha_nacimiento) {
                    Swal.showValidationMessage('Por favor su fecha de nacimiento');
                    return false;
                }

                return {
                    action: 'create',
                    id_tipo_usuario: 1,
                    id_grupo_flia: null,
                    primer_nombre: primer_nombre,
                    segundo_nombre: $('#segundo_nombre').val(),
                    primer_apellido: primer_apellido,
                    segundo_apellido: $('#segundo_apellido').val(),
                    tipo_cedula: $('#tipo_cedula').val(),
                    cedula: cedula,
                    serial_carnet_patria: $('#serial_carnet_patria').val(),
                    codigo_carnet_patria: $('#codigo_carnet_patria').val(),
                    genero: $('#genero').val(),
                    fecha_nacimiento: fecha_nacimiento,
                    telefono: $('#telefono').val(),
                    correo: $('#correo').val(),
                    parentesco: $('#parentesco').val(),
                    numero_hijos: $('#numero_hijos').val(),
                    status: $('#status').val()
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('habitantes.php', result.value, function(response) {
                    if (response === 'success') {
                        Swal.fire('Registrado', 'Persona registrada con éxito', 'success');
                        table.ajax.reload();
                    } else {
                        Swal.fire('Error', 'No se pudo registrar la persona', 'error');
                    }
                });
            }
        });
    });

    $(document).ready(function() {
    $('#personasTable').on('click', '.viewBtn', function() {
        var id = $(this).data('id');
        $.post('habitantes.php', { action: 'fetchById', id: id }, function(response) {
            var data = JSON.parse(response);
            var detailsHtml = `
                <table id="detailsTable" class="display">
                    <thead>
                        <tr>
                            <th>Valor</th>
                            <th>Datos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre</td>
                            <td>${data.primer_nombre} ${data.segundo_nombre}</td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td>${data.primer_apellido} ${data.segundo_apellido}</td>
                        </tr>
                        <tr>
                            <td>Tipo de Cédula</td>
                            <td>${data.tipo_cedula}</td>
                        </tr>
                        <tr>
                            <td>Cédula</td>
                            <td>${data.cedula}</td>
                        </tr>
                        <tr>
                            <td>Serial Carnet Patria</td>
                            <td>${data.serial_carnet_patria}</td>
                        </tr>
                        <tr>
                            <td>Código Carnet Patria</td>
                            <td>${data.codigo_carnet_patria}</td>
                        </tr>
                        <tr>
                            <td>Género</td>
                            <td>${data.genero}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento</td>
                            <td>${data.fecha_nacimiento}</td>
                        </tr>
                        <tr>
                            <td>Teléfono</td>
                            <td>${data.telefono}</td>
                        </tr>
                        <tr>
                            <td>Correo</td>
                            <td>${data.correo}</td>
                        </tr>
                        <tr>
                            <td>Parentesco</td>
                            <td>${data.parentesco}</td>
                        </tr>
                        <tr>
                            <td>Número de Hijos</td>
                            <td>${data.numero_hijos}</td>
                        </tr>
                        <tr>
                            <td>Estatus</td>
                            <td>${data.status}</td>
                        </tr>
                    </tbody>
                </table>
            `;
            Swal.fire({
                title: 'Detalles de Persona',
                html: detailsHtml
            });
        });
    });

    $('#personasTable').on('click', '.editBtn', function() {
        var id = $(this).data('id');
        $.post('habitantes.php', { action: 'fetchById', id: id }, function(response) {
            var data = JSON.parse(response);
            Swal.fire({
                title: 'Editar Persona',
                html: getFormHtml(data),
                preConfirm: () => {
                    let primer_nombre = $('#primer_nombre').val();
                    let primer_apellido = $('#primer_apellido').val();
                    let cedula = $('#cedula').val();
                    let fecha_nacimiento = $('#fecha_nacimiento').val();

                    if (!primer_nombre) {
                        Swal.showValidationMessage('Por favor ingrese su Primer Nombre');
                        return false;
                    }
                    if (!cedula) {
                        Swal.showValidationMessage('Por favor ingrese su cedula');
                        return false;
                    }
                    if (!primer_apellido) {
                        Swal.showValidationMessage('Por favor ingrese su Primer Apellido');
                        return false;
                    }
                    if (!fecha_nacimiento) {
                        Swal.showValidationMessage('Por favor su fecha de nacimiento');
                        return false;
                    }

                    return {
                        action: 'update',
                        id: id,
                        id_tipo_usuario: 1,
                        id_grupo_flia: null,
                        primer_nombre: primer_nombre,
                        segundo_nombre: $('#segundo_nombre').val(),
                        primer_apellido: primer_apellido,
                        segundo_apellido: $('#segundo_apellido').val(),
                        tipo_cedula: $('#tipo_cedula').val(),
                        cedula: cedula,
                        serial_carnet_patria: $('#serial_carnet_patria').val(),
                        codigo_carnet_patria: $('#codigo_carnet_patria').val(),
                        genero: $('#genero').val(),
                        fecha_nacimiento: fecha_nacimiento,
                        telefono: $('#telefono').val(),
                        correo: $('#correo').val(),
                        parentesco: $('#parentesco').val(),
                        numero_hijos: $('#numero_hijos').val(),
                        status: $('#status').val()
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('habitantes.php', result.value, function(response) {
                        if (response === 'success') {
                            Swal.fire('Actualizado', 'Persona actualizada con éxito', 'success');
                            table.ajax.reload();
                        } else {
                            Swal.fire('Error', 'No se pudo actualizar la persona', 'error');
                        }
                    });
                }
            });
        });
    });
});
});
</script>
</section>