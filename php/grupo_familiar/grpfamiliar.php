<?php require_once "vista_superior.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo Familiar</title>
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
        .assignBtn{
            background-color: #ffffff ;
            border: none;
            color: black;
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
        #registerBtn {
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
<div class="container">
<h1>Grupos Familiares</h1>
<button  id="registerBtn">Registrar +</button>
        <table id="gruposTable" class="display">
            <thead>
                <tr>
                    <th>Nombre de la Familia</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('#gruposTable').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ entradas totales)",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "ajax": "control_grpfamiliar.php?action=list",
                "columns": [
                    { "data": "nombre_familia" },
                    { "data": "status" },
                    {
                        "data": null,
                        "defaultContent": "<button class='viewBtn'>Ver</button> <button class='editBtn'>Editar</button> <button class='assignBtn'>Asignar</button>"
                    }
                ]
            });

            $('#registerBtn').on('click', function() {
                Swal.fire({
                    title: 'Registrar Grupo Familiar',
                    html: `
                        <form id="addGroupForm">
                            <label for="nombre_familia">Nombre de la Familia:</label>
                            <input type="text" id="nombre_familia" name="nombre_familia" required><br>
                            <label for="status">Status:</label>
                            <select id="status" name="status">
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </form>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Registrar',
                    preConfirm: () => {
                        const nombre_familia = $('#nombre_familia').val();
                        const status = $('#status').val();

                        if (!nombre_familia) {
                            Swal.showValidationMessage('El nombre de la familia es requerido');
                        }

                        return { nombre_familia: nombre_familia, status: status };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'control_grpfamiliar.php?action=add',
                            method: 'POST',
                            data: result.value,
                            success: function(response) {
                                Swal.fire('Registrado', 'El grupo familiar ha sido registrado correctamente.', 'success');
                                table.ajax.reload();
                            },
                            error: function() {
                                Swal.fire('Error', 'Hubo un error al registrar el grupo familiar.', 'error');
                            }
                        });
                    }
                });
            });

            $('#gruposTable tbody').on('click', 'button.viewBtn', function() {
                var data = table.row($(this).parents('tr')).data();
                $.ajax({
                    url: `control_grpfamiliar.php?action=view_group&id_grupo_flia=${data.id_grupo_flia}`,
                    method: 'GET',
                    success: function(response) {
                        var personas = JSON.parse(response);
                        var personasHtml = personas.map(persona => `
                            <p><strong>Nombre:</strong> ${persona.primer_nombre} ${persona.primer_apellido}</p>
                            <p><strong>Cédula:</strong> ${persona.cedula}</p>
                            <p><strong>Parentesco:</strong> ${persona.parentesco}</p>
                            <p><strong>Jefe de Familia:</strong> ${persona.jefe_familia}</p>
                            <hr>
                        `).join('');

                        Swal.fire({
                            title: 'Datos del Grupo Familiar',
                            html: personasHtml
                        });
                    },
                    error: function() {
                        Swal.fire('Error', 'Hubo un error al cargar los datos del grupo familiar.', 'error');
                    }
                });
            });

            $('#gruposTable tbody').on('click', 'button.editBtn', function() {
                var data = table.row($(this).parents('tr')).data();
                $.ajax({
                    url: `control_grpfamiliar.php?action=view_group&id_grupo_flia=${data.id_grupo_flia}`,
                    method: 'GET',
                    success: function(response) {
                        var personas = JSON.parse(response);
                        var jefeOptions = personas.map(persona => `
                            <option value="${persona.id_persona}" ${persona.jefe_familia === 'Sí' ? 'selected' : ''}>
                                ${persona.primer_nombre} ${persona.primer_apellido}
                            </option>
                        `).join('');

                        Swal.fire({
                            title: 'Editar Grupo Familiar',
                            html: `
                                <form id="editForm">
                                    <input type="hidden" id="edit_id_grupo_flia" value="${data.id_grupo_flia}">
                                    <label for="edit_nombre_familia">Nombre de la Familia:</label>
                                    <input type="text" id="edit_nombre_familia" value="${data.nombre_familia}"><br>
                                    <label for="edit_status">Status:</label>
                                    <select id="edit_status">
                                        <option value="Activo" ${data.status == 'Activo' ? 'selected' : ''}>Activo</option>
                                        <option value="Inactivo" ${data.status == 'Inactivo' ? 'selected' : ''}>Inactivo</option>
                                    </select><br>
                                    <label for="edit_jefe_familia">Jefe de Familia:</label>
                                    <select id="edit_jefe_familia">${jefeOptions}</select>
                                </form>
                            `,
                            showCancelButton: true,
                            confirmButtonText: 'Actualizar',
                            preConfirm: () => {
                                const id_grupo_flia = $('#edit_id_grupo_flia').val();
                                const nombre_familia = $('#edit_nombre_familia').val();
                                const status = $('#edit_status').val();
                                const id_jefe_familia = $('#edit_jefe_familia').val();

                                if (!nombre_familia) {
                                    Swal.showValidationMessage('El nombre de la familia es requerido');
                                }

                                return { id_grupo_flia: id_grupo_flia, nombre_familia: nombre_familia, status: status, id_jefe_familia: id_jefe_familia };
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: 'control_grpfamiliar.php?action=edit',
                                    method: 'POST',
                                    data: result.value,
                                    success: function(response) {
                                        Swal.fire('Actualizado', 'El grupo familiar ha sido actualizado correctamente.', 'success');
                                        table.ajax.reload();
                                    },
                                    error: function() {
                                        Swal.fire('Error', 'Hubo un error al actualizar el grupo familiar.', 'error');
                                    }
                                });
                            }
                        });
                    },
                    error: function() {
                        Swal.fire('Error', 'Hubo un error al cargar los datos del grupo familiar.', 'error');
                    }
                });
            });

            $('#gruposTable tbody').on('click', 'button.assignBtn', function() {
                var data = table.row($(this).parents('tr')).data();
                $.ajax({
                    url: 'control_grpfamiliar.php?action=list_personas',
                    method: 'GET',
                    success: function(response) {
                        var personas = JSON.parse(response);
                        var options = '';
                        personas.forEach(function(persona) {
                            options += `<option value="${persona.id_persona}">${persona.primer_nombre} ${persona.primer_apellido}</option>`;
                        });

                        Swal.fire({
                            title: 'Asignar Persona al Grupo Familiar',
                            html: `
                                <form id="assignPersonForm">
                                    <input type="hidden" id="assign_id_grupo_flia" value="${data.id_grupo_flia}">
                                    <label for="assign_persona">Persona:</label>
                                    <select id="assign_persona">${options}</select>
                                </form>
                            `,
                            showCancelButton: true,
                            confirmButtonText: 'Asignar',
                            preConfirm: () => {
                                const id_grupo_flia = $('#assign_id_grupo_flia').val();
                                const id_persona = $('#assign_persona').val();

                                return { id_grupo_flia: id_grupo_flia, id_persona: id_persona };
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: 'control_grpfamiliar.php?action=assign',
                                    method: 'POST',
                                    data: result.value,
                                    success: function(response) {
                                        Swal.fire('Asignado', 'La persona ha sido asignada al grupo familiar.', 'success');
                                        table.ajax.reload();
                                    },
                                    error: function() {
                                        Swal.fire('Error', 'Hubo un error al asignar la persona.', 'error');
                                    }
                                });
                            }
                        });
                    },
                    error: function() {
                        Swal.fire('Error', 'Hubo un error al cargar las personas disponibles.', 'error');
                    }
                });
            });
        });
    </script>
</section>