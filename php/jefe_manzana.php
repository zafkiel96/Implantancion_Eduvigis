<?php require_once "vista_superior.php"; ?>
<title>Jefe de Manzana</title>
<link rel="stylesheet" href="../styles/styles.css">
<link rel="stylesheet" type="text/css" href="../styles/jquery.dataTables.css">
<link rel="stylesheet" href="../styles/sweetalert2.min.css">
<script src="../scripts/sweetalert2.all.min.js"></script>
<style>
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
    <h2>Jefe de Manzana</h2>
    <button id="btnRegistrarJefeManzana" class="btn">Registrar jefe de mazana</button>
    <section class="details formulario formulario-Jefe_de_Manzana" style="display: none;">
            <form action="../controlador/controlador_jefe_manzana/reg_jefe_manzana.php" method="post">
                <div class="input-box">
                        <label for="tipo_documento" class="label">Tipo de Documento:
                            <select id="tipo_documento" name="tipo_documento[]">
                                <option value="V">V</option>
                                <option value="E">E</option>
                                <option value="J">J</option>
                            </select>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="cedula">
                            <input type="text" class="input" placeholder=" " id="cedula" name="cedula[]" required>
                            <span class="label_name">Cedula</span>
                        </label>
                    </div>
                <div class="input-box">
                    <label class="label">
                        <input type="text" class="input" placeholder=" " id="p_n_jefefamilia" name="p_n_jefefamilia"
                            required>
                        <span class="label_name">Primer Nombre</span>
                    </label>
                </div>
                <div class="input-box">
                    <label class="label">
                        <input type="text" class="input" placeholder=" " id="s_n_jefefamilia" name="s_n_jefefamilia"
                            required>
                        <span class="label_name">Segundo Nombre</span>
                    </label>
                </div>
                <div class="input-box">
                    <label class="label">
                        <input type="text" class="input" placeholder=" " id="p_a_jefefamilia" name="p_a_efefamilia"
                            required>
                        <span class="label_name">Primer Apellido</span>
                    </label>
                </div>
                <div class="input-box">
                    <label class="label">
                        <input type="text" class="input" placeholder=" " id="s_a_jefefamilia" name="s_a_jefefamilia"
                            required>
                        <span class="label_name">Segundo Apellido</span>
                    </label>
                </div>
                <div class="input-box">
                    <label class="label">
                        <input type="text" class="input" placeholder=" " id="direccion_vivienda"
                            name="direccion_vivienda_jf" required>
                        <span class="label_name">Dirección de su vivienda:</span>
                    </label>
                </div>
                <div class="input-box">
                    <label for="manzana" class="label">Manzana:
                        <select id="manzana" name="manzana">
                            <option value="1">Manzana 1</option>
                            <option value="2">Manzana 2</option>
                            <option value="3">Manzana 3</option>
                            <option value="4">Manzana 4</option>
                        </select>
                    </label>
                </div>
                <div class="input-box">
                    <label for="tenencia" class="label">Se encuentra:
                        <select id="tenencia" name="tenencia">
                            <option value="alquilar">Alquilado</option>
                            <option value="dueño">Casa Propia</option>
                        </select>
                    </label>
                </div>
                <div class="input-box">
                    <label for="parentesco" class="label">Parentesco:
                        <select id="parentesco" name="parentesco[]">
                            <option value="padre">Padre</option>
                            <option value="madre">Madre</option>
                            <option value="hijo">hijo</option>
                            <option value="hija">hija</option>
                        </select>
                    </label>
                </div>
                    <div class="input-box">
                        <label class="label" for="cedula">
                            <input type="date" name="fecha_nacimiento" class="input" placeholder=" " required>
                            <span class="label_name">Fecha de Nacimiento</span>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="correo">
                            <input type="email" class="input" placeholder=" " id="correo" name="correo[]" required>
                            <span class="label_name">Correo Electronico</span>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="serial">
                            <input type="text" class="input" placeholder=" " id="serial" name="serial[]" required>
                            <span class="label_name">Serial del Carnet de la Patria</span>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="codigo">
                            <input type="text" class="input" placeholder=" " id="codigo" name="carnet[]" required>
                            <span class="label_name">Código del carnet de la patria</span>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="discapacidad">
                            <input type="text" class="input" placeholder=" " id="discapacidad" name="discapacidad[]"
                                required>
                            <span class="label_name">Código del carnet de la patria</span>
                        </label>
                    </div>
                    <div class="input-box">
                        <label for="genero" class="label">Género
                            <select id="genero" name="genero[]">
                                <option value="masculino">M</option>
                                <option value="femenino">F</option>
                                <option value="otro">Otro</option>
                            </select><br>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="telefono">
                            <input type="text" class="input" placeholder=" " id="telefono" name="telefono[]" required>
                            <span class="label_name">Telefono</span>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="numero_hijos">
                            <input type="text" class="input" placeholder=" " id="numero_hijos" name="numero_hijos[]"
                                required>
                            <span class="label_name">Numero de Hijos</span>
                        </label>
                    </div>
                <input type="submit" name="RegistrarJefeManzana" value="Registrar Jefe de Manzana">
            </form>
        </section>
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
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
                <th>Manzana</th>
                <th>Casa</th>
                <th>Telefono</th>
                <th>Aciones</th>
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
        $('#btnRegistrarJefeManzana').click(function() {
            Swal.fire({
                title: 'Registrar Jefe de Manzana',
                html: $('.formulario-Jefe_de_Manzana').html(),
                showCancelButton: true,
                showConfirmButton: false
            });
        });
        $(document).on('submit', '.formulario-Jefe_de_Manzana form', function(event) {
            event.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    Swal.close();
                    Swal.fire({
                        title: 'Registro exitoso',
                        text: 'El jefe de manzana ha sido registrado correctamente.',
                        icon: 'success'
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un error al registrar al jefe de manzana. Por favor, inténtalo de nuevo más tarde.',
                        icon: 'error'
                    });
                }
            });
        });
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
</script>

