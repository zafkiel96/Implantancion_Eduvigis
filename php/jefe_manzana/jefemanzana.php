<?php require_once "vista_superior.php"; ?>
    <meta charset="UTF-8">
    <html lang="es">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jefes de Manzana</title>
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
        .editarBtn {
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
        #registrarUsuarioBtn {
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
        <h2>Jefes de Manzana</h2>
        <button id="registrarUsuarioBtn">Registrar +</button>
    <table id="jefesManzana" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Jefe Manzana</th>
                <th>Cédula</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Fecha de Registro</th>
                <th>Status</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conexion.php';
            $sql = "SELECT p.primer_nombre, p.primer_apellido, u.cedula, u.usuario, u.correo, tu.fecha_registro, u.status, u.id_usuario 
                    FROM usuarios u 
                    JOIN tipos_usuarios tu ON u.id_usuario = tu.id_usuario 
                    JOIN personas p ON p.cedula = u.cedula 
                    WHERE tu.tipo = 'Jefe Manzana'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['primer_nombre']} {$row['primer_apellido']}</td>
                            <td>{$row['cedula']}</td>
                            <td>{$row['usuario']}</td>
                            <td>{$row['correo']}</td>
                            <td>{$row['fecha_registro']}</td>
                            <td>{$row['status']}</td>
                            <td><button class='editarBtn' data-id='{$row['id_usuario']}'><i class='bx bx-edit'>Editar</button></td>
                          </tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#jefesManzana').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
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

            $('#registrarUsuarioBtn').click(function() {
                Swal.fire({
                    title: 'Registrar Jefe de Manzana',
                    html: `<input type="text" id="cedula" class="swal2-input" placeholder="Cédula" required pattern="\d*" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                           <input type="text" id="usuario" class="swal2-input" placeholder="Usuario">
                           <input type="password" id="contraseña" class="swal2-input" placeholder="Contraseña">
                           <input type="email" id="correo" class="swal2-input" placeholder="Correo">
                           <select id="status" class="swal2-input">
                               <option value="Activo">Activo</option>
                               <option value="Inactivo">Inactivo</option>
                           </select>`,
                    focusConfirm: false,
                    preConfirm: () => {
                        const cedula = Swal.getPopup().querySelector('#cedula').value
                        const usuario = Swal.getPopup().querySelector('#usuario').value
                        const contraseña = Swal.getPopup().querySelector('#contraseña').value
                        const correo = Swal.getPopup().querySelector('#correo').value
                        const status = Swal.getPopup().querySelector('#status').value
                        if (!cedula || !usuario || !contraseña || !correo || !status) {
                            Swal.showValidationMessage(`Por favor, complete todos los campos`)
                        }
                        return { cedula: cedula, usuario: usuario, contraseña: contraseña, correo: correo, status: status }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post('crl-jmanzanas.php', {
                            action: 'registrar',
                            cedula: result.value.cedula,
                            usuario: result.value.usuario,
                            contraseña: result.value.contraseña,
                            correo: result.value.correo,
                            status: result.value.status
                        }).done(function(response) {
                            Swal.fire('Éxito', response, 'success').then(() => location.reload());
                        }).fail(function() {
                            Swal.fire('Error', 'No se pudo registrar el usuario', 'error');
                        });
                    }
                });
            });

            $('.editarBtn').click(function() {
                const id_usuario = $(this).data('id');
                
                $.get('crl-jmanzanas.php', {action: 'obtener', id_usuario: id_usuario}, function(data) {
                    const usuarioData = JSON.parse(data);

                    Swal.fire({
                        title: 'Editar Usuario y Contraseña',
                        html: `<input type="text" id="editUsuario" class="swal2-input" value="${usuarioData.usuario}" placeholder="Usuario">
                               <input type="password" id="editContraseña" class="swal2-input" value="${usuarioData.contraseña}" placeholder="Contraseña">
                               <input type="email" id="editCorreo" class="swal2-input" value="${usuarioData.correo}" placeholder="Correo">
                               <select id="editStatus" class="swal2-input">
                                   <option value="Activo" ${usuarioData.status === 'Activo' ? 'selected' : ''}>Activo</option>
                                   <option value="Inactivo" ${usuarioData.status === 'Inactivo' ? 'selected' : ''}>Inactivo</option>
                               </select>`,
                        focusConfirm: false,
                        preConfirm: () => {
                            const usuario = Swal.getPopup().querySelector('#editUsuario').value
                            const contraseña = Swal.getPopup().querySelector('#editContraseña').value
                            const correo = Swal.getPopup().querySelector('#editCorreo').value
                            const status = Swal.getPopup().querySelector('#editStatus').value
                            if (!usuario || !correo || !status) {
                                Swal.showValidationMessage(`Por favor, complete todos los campos`)
                            }
                            return { usuario: usuario, contraseña: contraseña, correo: correo, status: status }
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.post('crl-jmanzanas.php', {
                                action: 'editar',
                                id_usuario: id_usuario,
                                usuario: result.value.usuario,
                                contraseña: result.value.contraseña,
                                correo: result.value.correo,
                                status: result.value.status
                            }).done(function(response) {
                                Swal.fire('Éxito', response, 'success').then(() => location.reload());
                            }).fail(function() {
                                Swal.fire('Error', 'No se pudo editar el usuario', 'error');
                            });
                        }
                    });
                });
            });
        });
</script>
</section>