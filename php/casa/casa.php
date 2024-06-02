<?php require_once "vista_superior.php"; ?>
<title>Casas</title>
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
        #addHouseBtn{
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
        .editBtn{
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
</style>
<div class="details section">
    <div class="recentRegisters">
    <h2>Casas</h2>
    <button id="addHouseBtn">Registrar +</button>
    <table id="housesTable" class="display">
        <thead>
            <tr>
                <th>Número de Casa</th>
                <th>Manzana</th>
                <th>Grupo Familiar</th>
                <th>Tenencia</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion.php';
            $sql = "SELECT casas.*, manzanas.numero_manzana, grupos_familiares.nombre_familia 
                    FROM casas 
                    JOIN manzanas ON casas.id_manzana = manzanas.id_manzana 
                    JOIN grupos_familiares ON casas.id_grupo_familiar = grupos_familiares.id_grupo_flia";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['numero_casa']}</td>
                            <td>{$row['numero_manzana']}</td>
                            <td>{$row['nombre_familia']}</td>
                            <td>{$row['ten_casa']}</td>
                            <td>{$row['status']}</td>
                            <td><button class='editBtn' data-id='{$row['id_casa']}'>Editar</button></td>
                          </tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#housesTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });

            $('#addHouseBtn').on('click', function() {
                Swal.fire({
                    title: 'Registrar Casa',
                    html: `
                        <input type="number" id="numero_casa" class="swal2-input" placeholder="Número de Casa">
                        <select id="id_manzana" class="swal2-input">
                            <option value="" disabled selected>Selecciona una Manzana</option>
                            <?php
                            $sql = "SELECT id_manzana, numero_manzana FROM manzanas";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['id_manzana']}'>{$row['numero_manzana']}</option>";
                            }
                            ?>
                        </select>
                        <select id="id_grupo_familiar" class="swal2-input">
                            <option value="" disabled selected>Selecciona un Grupo Familiar</option>
                            <?php
                            $sql = "SELECT id_grupo_flia, nombre_familia FROM grupos_familiares";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['id_grupo_flia']}'>{$row['nombre_familia']}</option>";
                            }
                            ?>
                        </select>
                        <input type="text" id="anexo_casa" class="swal2-input" placeholder="Anexo Casa">
                        <select id="ten_casa" class="swal2-input">
                            <option value="Propia">Propia</option>
                            <option value="Alquilada">Alquilada</option>
                        </select>
                        <select id="status" class="swal2-input">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    `,
                    focusConfirm: false,
                    preConfirm: () => {
                        const numero_casa = Swal.getPopup().querySelector('#numero_casa').value;
                        const id_manzana = Swal.getPopup().querySelector('#id_manzana').value;
                        const id_grupo_familiar = Swal.getPopup().querySelector('#id_grupo_familiar').value;
                        const anexo_casa = Swal.getPopup().querySelector('#anexo_casa').value;
                        const ten_casa = Swal.getPopup().querySelector('#ten_casa').value;
                        const status = Swal.getPopup().querySelector('#status').value;

                        if (!numero_casa || !id_manzana || !id_grupo_familiar || !anexo_casa || !ten_casa || !status) {
                            Swal.showValidationMessage(`Por favor, completa todos los campos`);
                        }

                        return { numero_casa, id_manzana, id_grupo_familiar, anexo_casa, ten_casa, status };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post('crlcasa.php', {
                            action: 'add',
                            numero_casa: result.value.numero_casa,
                            id_manzana: result.value.id_manzana,
                            id_grupo_familiar: result.value.id_grupo_familiar,
                            anexo_casa: result.value.anexo_casa,
                            ten_casa: result.value.ten_casa,
                            status: result.value.status
                        }, function(response) {
                            if (response === 'error') {
                                Swal.fire('Error', 'El grupo familiar ya está registrado en otra casa', 'error');
                            } else {
                                Swal.fire('Guardado', response, 'success').then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });

            $('.editBtn').on('click', function() {
                const id_casa = $(this).data('id');

                $.get(`crlcasa.php?action=get&id=${id_casa}`, function(data) {
                    const house = JSON.parse(data);

                    Swal.fire({
                        title: 'Editar Casa',
                        html: `
                            <input type="hidden" id="id_casa" value="${house.id_casa}">
                            <input type="number" id="numero_casa" class="swal2-input" value="${house.numero_casa}">
                            <select id="id_manzana" class="swal2-input">
                                <?php
                                $sql = "SELECT id_manzana, numero_manzana FROM manzanas";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id_manzana']}'>{$row['numero_manzana']}</option>";
                                }
                                ?>
                            </select>
                            <select id="id_grupo_familiar" class="swal2-input">
                                <?php
                                $sql = "SELECT id_grupo_flia, nombre_familia FROM grupos_familiares";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id_grupo_flia']}'>{$row['nombre_familia']}</option>";
                                }
                                ?>
                            </select>
                            <input type="text" id="anexo_casa" class="swal2-input" value="${house.anexo_casa}">
                            <select id="ten_casa" class="swal2-input">
                                <option value="Propia" ${house.ten_casa === 'Propia' ? 'selected' : ''}>Propia</option>
                                <option value="Alquilada" ${house.ten_casa === 'Alquilada' ? 'selected' : ''}>Alquilada</option>
                            </select>
                            <select id="status" class="swal2-input">
                                <option value="Activo" ${house.status === 'Activo' ? 'selected' : ''}>Activo</option>
                                <option value="Inactivo" ${house.status === 'Inactivo' ? 'selected' : ''}>Inactivo</option>
                            </select>
                        `,
                        focusConfirm: false,
                        preConfirm: () => {
                            const id_casa = Swal.getPopup().querySelector('#id_casa').value;
                            const numero_casa = Swal.getPopup().querySelector('#numero_casa').value;
                            const id_manzana = Swal.getPopup().querySelector('#id_manzana').value;
                            const id_grupo_familiar = Swal.getPopup().querySelector('#id_grupo_familiar').value;
                            const anexo_casa = Swal.getPopup().querySelector('#anexo_casa').value;
                            const ten_casa = Swal.getPopup().querySelector('#ten_casa').value;
                            const status = Swal.getPopup().querySelector('#status').value;

                            if (!numero_casa || !id_manzana || !id_grupo_familiar || !anexo_casa || !ten_casa || !status) {
                                Swal.showValidationMessage(`Por favor, completa todos los campos`);
                            }

                            return { id_casa, numero_casa, id_manzana, id_grupo_familiar, anexo_casa, ten_casa, status };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.post('crlcasa.php', {
                                action: 'edit',
                                id_casa: result.value.id_casa,
                                numero_casa: result.value.numero_casa,
                                id_manzana: result.value.id_manzana,
                                id_grupo_familiar: result.value.id_grupo_familiar,
                                anexo_casa: result.value.anexo_casa,
                                ten_casa: result.value.ten_casa,
                                status: result.value.status
                            }, function(response) {
                                if (response === 'error') {
                                    Swal.fire('Error', 'El grupo familiar ya está registrado en otra casa', 'error');
                                } else {
                                    Swal.fire('Actualizado', response, 'success').then(() => {
                                        location.reload();
                                    });
                                }
                            });
                        }
                    });
                });
            });
        });
</script>
