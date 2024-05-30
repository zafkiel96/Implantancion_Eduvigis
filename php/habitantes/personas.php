<?php require_once "vista_superior.php"; ?>
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
            <h2>Habitantes</h2>
                <button  id="registerBtn">Registrar +</button>
                    <table id="personasTable" class="display">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Número de Cédula</th>
                                <th>Teléfono</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $('#personasTable').DataTable({
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
            "ajax": "habitantes.php?action=list",
            "columns": [
                { "data": "primer_nombre" },
                { "data": "primer_apellido" },
                { "data": "cedula" },
                { "data": "telefono" },
                { "data": "status" },
                {
                    "data": null,
                    "defaultContent": "<button class='viewBtn'><i class='bx bx-show'></i> Ver</button> <button class='editBtn'><i class='bx bx-edit'></i> Editar</button>"
                }
            ]
        });

        $('#personasTable tbody').on('click', 'button.viewBtn', function() {
            var data = $('#personasTable').DataTable().row($(this).parents('tr')).data();
            Swal.fire({
                title: 'Datos del Heabitante',
                html: `
                <div id="infoContainer">
        <table>
            <tr>
                <th>Campo</th>
                <th>Datos</th>
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
                <td>Primer Nombre</td>
                <td>${data.primer_nombre}</td>
            </tr>
            <tr>
                <td>Segundo Nombre</td>
                <td>${data.segundo_nombre}</td>
            </tr>
            <tr>
                <td>Primer Apellido</td>
                <td>${data.primer_apellido}</td>
            </tr>
            <tr>
                <td>Segundo Apellido</td>
                <td>${data.segundo_apellido}</td>
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
                <td>Status</td>
                <td>${data.status}</td>
            </tr>
            <tr>
                <td>Fecha de Registro</td>
                <td>${data.fecha_registro}</td>
            </tr>
        </table>
    </div>
                `
            });
        });

        $('#personasTable tbody').on('click', 'button.editBtn', function() {
            var data = $('#personasTable').DataTable().row($(this).parents('tr')).data();
            Swal.fire({
                title: 'Editar datos del Habitante',
                html: `
                    <form id="editForm">
                        <label for="edit_tipo_cedula">Tipo de Cédula:</label>
                        <select id="edit_tipo_cedula" required>
                            <option value="Venezolano" ${data.tipo_cedula === 'V' ? 'selected' : ''}>V</option>
                            <option value="Extranjero" ${data.tipo_cedula === 'E' ? 'selected' : ''}>E</option>
                            <option value="Juridico" ${data.tipo_cedula === 'J' ? 'selected' : ''}>J</option>
                        </select><br>
                        <label for="edit_cedula">Cédula:</label>
                        <input type="text" id="edit_cedula"  value="${data.cedula} " required pattern="\d*" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        <br>
                        <label for="edit_serial_carnet_patria">Serial Carnet Patria:</label>
                        <input type="text" id="edit_serial_carnet_patria" value="${data.serial_carnet_patria}"required pattern="\d*" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');"><br>
                        <label for="edit_codigo_carnet_patria">Código Carnet Patria:</label>
                        <input type="text" id="edit_codigo_carnet_patria" value="${data.codigo_carnet_patria}"required pattern="\d*" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');"><br>
                        <label for="edit_primer_nombre">Primer Nombre:</label>
                        <input type="text" id="edit_primer_nombre" value="${data.primer_nombre}"required pattern="[A-Za-zÁ-ÿ\s]*" maxlength="10" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\s]/g, '');"><br>
                        <label for="edit_segundo_nombre">Segundo Nombre:</label>
                        <input type="text" id="edit_segundo_nombre" value="${data.segundo_nombre}"required pattern="[A-Za-zÁ-ÿ\s]*" maxlength="10" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\s]/g, '');"><br>
                        <label for="edit_primer_apellido">Primer Apellido:</label>
                        <input type="text" id="edit_primer_apellido" value="${data.primer_apellido}"required pattern="[A-Za-zÁ-ÿ\s]*" maxlength="10" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\s]/g, '');"><br>
                        <label for="edit_segundo_apellido">Segundo Apellido:</label>
                        <input type="text" id="edit_segundo_apellido" value="${data.segundo_apellido}"required pattern="[A-Za-zÁ-ÿ\s]*" maxlength="10" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\s]/g, '');"><br>
                        <label for="edit_genero">Género:</label>
                        <select id="edit_genero" required>
                            <option value="Hombre" ${data.genero === 'Hombre' ? 'selected' : ''}>Hombre</option>
                            <option value="Mujer" ${data.genero === 'Mujer' ? 'selected' : ''}>Mujer</option>
                            <option value="Otro" ${data.genero === 'Otro' ? 'selected' : ''}>Otro</option>
                        </select><br>
                        <label for="edit_fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" id="edit_fecha_nacimiento" value="${data.fecha_nacimiento}" required><br>
                        <label for="edit_telefono">Teléfono:</label>
                        <input type="text" id="edit_telefono" value="${data.telefono}"required pattern="\d*" maxlength="11";"><br>
                        <label for="edit_correo">Correo:</label>
                        <input type="email" id="edit_correo" value="${data.correo}"required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3,}" oninput="this.setCustomValidity(''); if(!this.checkValidity()) this.setCustomValidity('Por favor, introduce un correo válido con al menos tres letras antes del punto y tres letras después del punto.');"><br>
                        <label for="edit_parentesco">Parentesco:</label>
                        <select id="edit_parentesco" required>
                            <option value="Padre" ${data.parentesco === 'Padre' ? 'selected' : ''}>Padre</option>
                            <option value="Madre" ${data.parentesco === 'Madre' ? 'selected' : ''}>Madre</option>
                            <option value="Hijo(a)" ${data.parentesco === 'Hijo(a)' ? 'selected' : ''}>Hijo(a)</option>
                            <option value="Hermano(a)" ${data.parentesco === 'Hermano(a)' ? 'selected' : ''}>Hermano(a)</option>
                            <option value="Suegro(a)" ${data.parentesco === 'Suegro(a)' ? 'selected' : ''}>Suegro(a)</option>
                            <option value="Yerno" ${data.parentesco === 'Yerno' ? 'selected' : ''}>Yerno</option>
                            <option value="Nuera" ${data.parentesco === 'Nuera' ? 'selected' : ''}>Nuera</option>
                        </select><br>
                        <label for="edit_numero_hijos">Número de Hijos:</label>
                        <input type="number" id="edit_numero_hijos" value="${data.numero_hijos}"required min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '');"><br>
                        <label for="edit_status">Status:</label>
                        <select id="edit_status" required>
                            <option value="Activo" ${data.status === 'Activo' ? 'selected' : ''}>Activo</option>
                            <option value="Inactivo" ${data.status === 'Inactivo' ? 'selected' : ''}>Inactivo</option>
                        </select><br>
                    </form>
                `,
                showCancelButton: true,
                confirmButtonText: 'Actualizar',
                cancelButtonText: 'Cancelar',
                preConfirm: () => {
                    const id_persona = data.id_persona;
                    const tipo_cedula = $('#edit_tipo_cedula').val();
                    const cedula = $('#edit_cedula').val();
                    const serial_carnet_patria = $('#edit_serial_carnet_patria').val();
                    const codigo_carnet_patria = $('#edit_codigo_carnet_patria').val();
                    const primer_nombre = $('#edit_primer_nombre').val();
                    const segundo_nombre = $('#edit_segundo_nombre').val();
                    const primer_apellido = $('#edit_primer_apellido').val();
                    const segundo_apellido = $('#edit_segundo_apellido').val();
                    const genero = $('#edit_genero').val();
                    const fecha_nacimiento = $('#edit_fecha_nacimiento').val();
                    const telefono = $('#edit_telefono').val();
                    const correo = $('#edit_correo').val();
                    const parentesco = $('#edit_parentesco').val();
                    const numero_hijos = $('#edit_numero_hijos').val();
                    const status = $('#edit_status').val();

                    return $.ajax({
                        url: 'habitantes.php?action=edit',
                        method: 'POST',
                        data: {
                            id_persona: id_persona,
                            tipo_cedula: tipo_cedula,
                            cedula: cedula,
                            serial_carnet_patria: serial_carnet_patria,
                            codigo_carnet_patria: codigo_carnet_patria,
                            primer_nombre: primer_nombre,
                            segundo_nombre: segundo_nombre,
                            primer_apellido: primer_apellido,
                            segundo_apellido: segundo_apellido,
                            genero: genero,
                            fecha_nacimiento: fecha_nacimiento,
                            telefono: telefono,
                            correo: correo,
                            parentesco: parentesco,
                            numero_hijos: numero_hijos,
                            status: status
                        },
                        success: function(response) {
        var jsonResponse = JSON.parse(response);
        if (jsonResponse.status === 'error') {
            if (jsonResponse.message === 'duplicado_cedula') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ya existe una persona registrada con el mismo número de cédula.'
                });
            } else if (jsonResponse.message === 'duplicado_serial') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ya existe una persona registrada con el mismo serial Carnet Patria.'
                });
            } else if (jsonResponse.message === 'duplicado_codigo') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ya existe una persona registrada con el mismo código Carnet Patria.'
                });
            } } else {
                                Swal.fire('Actualizado', 'La persona ha sido actualizada correctamente.', 'success');
                                $('#personasTable').DataTable().ajax.reload();
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Hubo un error al actualizar la persona.', 'error');
                        }
                    });
                }
            });
        });

        $('#registerBtn').click(function() {
            Swal.fire({
                title: 'Registrar Habitante',
                html: `
                <form id="registerForm">
                <label for="register_tipo_cedula">Tipo de Cédula:</label>
    <select id="register_tipo_cedula" required>
        <option value="Venezolano">Venezolano</option>
        <option value="Extranjero">Extranjero</option>
        <option value="Juridico">Juridico</option>
    </select><br>

    <label for="register_cedula">Cédula:</label>
    <input type="text" id="register_cedula" required pattern="\d*" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');"><br>

    <label for="register_serial_carnet_patria">Serial Carnet Patria:</label>
    <input type="text" id="register_serial_carnet_patria" required pattern="\d*" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');"><br>

    <label for="register_codigo_carnet_patria">Código Carnet Patria:</label>
    <input type="text" id="register_codigo_carnet_patria" required pattern="\d*" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');"><br>

    <label for="register_primer_nombre">Primer Nombre:</label>
    <input type="text" id="register_primer_nombre" required pattern="[A-Za-zÁ-ÿ\s]*" maxlength="10" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\s]/g, '');"><br>

    <label for="register_segundo_nombre">Segundo Nombre:</label>
    <input type="text" id="register_segundo_nombre" required pattern="[A-Za-zÁ-ÿ\s]*" maxlength="10" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\s]/g, '');"><br>

    <label for="register_primer_apellido">Primer Apellido:</label>
    <input type="text" id="register_primer_apellido" required pattern="[A-Za-zÁ-ÿ\s]*" maxlength="10" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\s]/g, '');"><br>

    <label for="register_segundo_apellido">Segundo Apellido:</label>
    <input type="text" id="register_segundo_apellido" required pattern="[A-Za-zÁ-ÿ\s]*" maxlength="10" oninput="this.value = this.value.replace(/[^A-Za-zÁ-ÿ\s]/g, '');"><br>

    <label for="register_genero">Género:</label>
    <select id="register_genero" required>
        <option value="Hombre">Hombre</option>
        <option value="Mujer">Mujer</option>
        <option value="Otro">Otro</option>
    </select><br>

    <label for="register_fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="register_fecha_nacimiento" required><br>

    <label for="register_telefono">Teléfono:</label>
    <input type="text" id="register_telefono" required pattern="\d*" maxlength="11";"><br>

    <label for="register_correo">Correo:</label>
    <input type="email" id="register_correo" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3,}" oninput="this.setCustomValidity(''); if(!this.checkValidity()) this.setCustomValidity('Por favor, introduce un correo válido con al menos tres letras antes del punto y tres letras después del punto.');"><br>

    <label for="register_parentesco">Parentesco:</label>
    <select id="register_parentesco" required>
        <option value="Padre">Padre</option>
        <option value="Madre">Madre</option>
        <option value="Hijo(a)">Hijo(a)</option>
        <option value="Hermano(a)">Hermano(a)</option>
        <option value="Suegro(a)">Suegro(a)</option>
        <option value="Yerno">Yerno</option>
        <option value="Nuera">Nuera</option>
    </select><br>

    <label for="register_numero_hijos">Número de Hijos:</label>
    <input type="number" id="register_numero_hijos" required min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '');"><br>

    <label for="register_status">Status:</label>
    <select id="register_status" required>
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
    </select><br>
</form>

                `,
                showCancelButton: true,
                confirmButtonText: 'Registrar',
                cancelButtonText: 'Cancelar',
                preConfirm: () => {
                    const tipo_cedula = $('#register_tipo_cedula').val();
                    const cedula = $('#register_cedula').val();
                    const serial_carnet_patria = $('#register_serial_carnet_patria').val();
                    const codigo_carnet_patria = $('#register_codigo_carnet_patria').val();
                    const primer_nombre = $('#register_primer_nombre').val();
                    const segundo_nombre = $('#register_segundo_nombre').val();
                    const primer_apellido = $('#register_primer_apellido').val();
                    const segundo_apellido = $('#register_segundo_apellido').val();
                    const genero = $('#register_genero').val();
                    const fecha_nacimiento = $('#register_fecha_nacimiento').val();
                    const telefono = $('#register_telefono').val();
                    const correo = $('#register_correo').val();
                    const parentesco = $('#register_parentesco').val();
                    const numero_hijos = $('#register_numero_hijos').val();
                    const status = $('#register_status').val();

                    return $.ajax({
                        url: 'habitantes.php?action=add',
                        method: 'POST',
                        data: {
                            tipo_cedula: tipo_cedula,
                            cedula: cedula,
                            serial_carnet_patria: serial_carnet_patria,
                            codigo_carnet_patria: codigo_carnet_patria,
                            primer_nombre: primer_nombre,
                            segundo_nombre: segundo_nombre,
                            primer_apellido: primer_apellido,
                            segundo_apellido: segundo_apellido,
                            genero: genero,
                            fecha_nacimiento: fecha_nacimiento,
                            telefono: telefono,
                            correo: correo,
                            parentesco: parentesco,
                            numero_hijos: numero_hijos,
                            status: status
                        },
                        success: function(response) {
        var jsonResponse = JSON.parse(response);
        if (jsonResponse.status === 'error') {
            if (jsonResponse.message === 'duplicado_cedula') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ya existe una persona registrada con el mismo número de cédula.'
                });
            } else if (jsonResponse.message === 'duplicado_serial') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ya existe una persona registrada con el mismo serial Carnet Patria.'
                });
            } else if (jsonResponse.message === 'duplicado_codigo') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ya existe una persona registrada con el mismo código Carnet Patria.'
                });
            } }  else {
                                Swal.fire('Registrado', 'La persona ha sido registrada correctamente.', 'success');
                                $('#personasTable').DataTable().ajax.reload();
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Hubo un error al registrar la persona.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
</section>