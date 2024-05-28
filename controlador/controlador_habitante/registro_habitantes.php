
<script type="text/javascript" charset="utf8" src="../scripts/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="../scripts/jquery.dataTables.js"></script>
<link rel="stylesheet" href="../styles/styles.css">
<link rel="stylesheet" type="text/css" href="../styles/jquery.dataTables.css">
<link rel="stylesheet" href="../styles/sweetalert2.min.css">
<script src="../scripts/sweetalert2.all.min.js"></script>
<form action="" method="post">
                    <div class="input-box">
                        <label for="tipo_documento" class="label">Tipo de Documento:
                            <select id="tipo_documento" name="tipo_documento[]">
                                <option value="Venezolano">V</option>
                                <option value="Extranjero">E</option>
                                <option value="Juridico">J</option>
                            </select>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="cedula">
                            <input type="text" class="input" placeholder="Cedula " id="cedula" name="cedula[]" required pattern="\d*" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </label>
                    </div>
                <div class="input-box">
                    <label class="label">
                        <input type="text" class="input" placeholder="Primer Nombre " id="primer_nombre" name="primer_nombre" required pattern="[A-Za-z]*" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">
                    </label>
                </div>
                <div class="input-box">
                    <label class="label">
                        <input type="text" class="input" placeholder="Segundo Nombre " id="segundo_nombre" name="segundo_nombre" required pattern="[A-Za-z]*" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">
                    </label>
                </div>
                <div class="input-box">
                    <label class="label">
                        <input type="text" class="input" placeholder="Primer Apellido " id="primer_apellido" name="primer_apellido" required pattern="[A-Za-z]*" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">
                    </label>
                </div>
                <div class="input-box">
                    <label class="label">
                        <input type="text" class="input" placeholder="Segundo Apellido " id="segundo_apellido" name="segundo_apellido" required pattern="[A-Za-z]*" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">
                    </label>
                </div>
                
                <div class="input-box">
                    <label class="label" for="grupo_familiar_id">
                    <label for="grupo_familiar_id">Seleccione un grupo familiar:</label>
                    <select id="grupo_familiar_id" name="grupo_familiar_id" required>
                        <option value="">Seleccione</option>
                            <?php
                                include '../controlador/conexion.php';

                                $sql = "SELECT id_grupo_flia, nombre_familia, status FROM grupos_familiares "; // Filtrando solo los activos si es necesario
                                $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '<option value="' . htmlspecialchars($row['id_grupo_flia']) . '">' . htmlspecialchars($row['nombre_familia']) . '</option>';
                                        }
                                    } else {
                                                echo '<option value="">No hay grupos familiares disponibles</option>';
                                            }

                                $conn->close();
                            ?>
                    </select>
                </div>
                <div class="input-box">
                    <label for="parentesco" class="label">Parentesco:
                        <select id="parentesco" name="parentesco[]">
                            <option value="padre">Padre</option>
                            <option value="madre">Madre</option>
                            <option value="hijo">Hijo</option>
                            <option value="hija">Hija</option>
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
                        <input type="email" class="input" placeholder="Correo Electrónico" id="correo" name="correo[]">
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="serial">
                            <input type="text" class="input" placeholder="Serial del Carnet de la Patria " id="serial" name="serial[]" required pattern="\d*" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="codigo">
                            <input type="text" class="input" placeholder="Código del carnet de la patria " id="codigo" name="carnet[]" required pattern="\d*" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </label>
                    </div>
                    <div class="input-box">
                        <label for="genero" class="label">Género
                            <select id="genero" name="genero[]">
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select><br>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="telefono">
                            <input type="text" class="input" placeholder="Telefono " id="telefono" name="telefono[]" required pattern="\d*" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="numero_hijos">
                            <input type="text" class="input" placeholder="Numero de Hijos " id="numero_hijos" name="numero_hijos[]" required pattern="\d*" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </label>
                    </div>
                    <button id="btnRegistrarJefeManzana" type="submit" name="RegistrarJefeManzana" class="btn">Registrar Habitante</button>
            </form>
            <?php
include '../controlador/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo_cedula = $_POST['tipo_documento'][0];
    $cedula = filter_var($_POST['cedula'][0], FILTER_SANITIZE_NUMBER_INT);
    $serial_carnet_patria = filter_var($_POST['serial'][0], FILTER_SANITIZE_NUMBER_INT);
    $codigo_carnet_patria = filter_var($_POST['carnet'][0], FILTER_SANITIZE_NUMBER_INT);
    $primer_nombre = filter_var($_POST['primer_nombre'], FILTER_SANITIZE_STRING);
    $segundo_nombre = filter_var($_POST['segundo_nombre'], FILTER_SANITIZE_STRING);
    $primer_apellido = filter_var($_POST['primer_apellido'], FILTER_SANITIZE_STRING);
    $segundo_apellido = filter_var($_POST['segundo_apellido'], FILTER_SANITIZE_STRING);
    $genero = filter_var($_POST['genero'][0], FILTER_SANITIZE_STRING);
    $fecha_nacimiento = filter_var($_POST['fecha_nacimiento'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'][0], FILTER_SANITIZE_NUMBER_INT);
    $correo = filter_var($_POST['correo'][0], FILTER_SANITIZE_EMAIL);
    $parentesco = filter_var($_POST['parentesco'][0], FILTER_SANITIZE_STRING);
    $numero_hijos = filter_var($_POST['numero_hijos'][0], FILTER_SANITIZE_NUMBER_INT);
    $id_grupo_flia = filter_var($_POST['grupo_familiar_id'], FILTER_SANITIZE_NUMBER_INT);
    $status = 'activo';

    // Iniciar transacción
    $conn->begin_transaction();

    // Verificar si ya existe la cédula
    $stmt = $conn->prepare("SELECT COUNT(*) FROM personas WHERE cedula = ?");
    $stmt->bind_param("i", $cedula);
    $stmt->execute();
    $stmt->bind_result($countCedula);
    $stmt->fetch();
    $stmt->close();

    if ($countCedula > 0) {
        $conn->rollback();
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ya existe una persona registrada con la misma cedula.',
            showConfirmButton: true,
            confirmButtonText: 'Ok'
        }).then(() => {
            window.location.href = 'habitantes.php';
        });
    </script>";
    exit();
    }

    // Verificar si ya existe el serial del carnet patria
    $stmt = $conn->prepare("SELECT COUNT(*) FROM personas WHERE serial_carnet_patria = ?");
    $stmt->bind_param("i", $serial_carnet_patria);
    $stmt->execute();
    $stmt->bind_result($countSerial);
    $stmt->fetch();
    $stmt->close();

    if ($countSerial > 0) {
        $conn->rollback();
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ya existe una persona registrada con el mismo serial del carnet patria.',
                showConfirmButton: true,
                confirmButtonText: 'Ok',
            }).then(() => {
                window.location.href = 'habitantes.php';
            });
        </script>";
        exit();
    }

    // Verificar si ya existe el código del carnet patria
    $stmt = $conn->prepare("SELECT COUNT(*) FROM personas WHERE codigo_carnet_patria = ?");
    $stmt->bind_param("i", $codigo_carnet_patria);
    $stmt->execute();
    $stmt->bind_result($countCodigo);
    $stmt->fetch();
    $stmt->close();

    if ($countCodigo > 0) {
        $conn->rollback();
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ya existe una persona registrada con el mismo código del carnet patria.',
                showConfirmButton: true,
                confirmButtonText: 'Ok',
            }).then(() => {
                window.location.href = 'habitantes.php';
            });
        </script>";
        exit();
    }

    // Ajusta los nombres de las columnas en esta consulta según la estructura real de tu tabla `personas`
    $stmt = $conn->prepare("INSERT INTO personas (tipo_cedula, cedula, serial_carnet_patria, codigo_carnet_patria, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, genero, fecha_nacimiento, telefono, correo, parentesco, numero_hijos, id_grupo_flia, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiissssssssiiis", $tipo_cedula, $cedula, $serial_carnet_patria, $codigo_carnet_patria, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $genero, $fecha_nacimiento, $telefono, $correo, $parentesco, $numero_hijos, $id_grupo_flia, $status);

    if ($stmt->execute()) {
        $conn->commit();
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: 'Registro exitoso.',
                showConfirmButton: true,
                confirmButtonText: 'Ok',
            }).then(() => {
                window.location.href = 'habitantes.php';
            });
        </script>";
    } else {
        $conn->rollback();
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error al registrar la persona.',
                showConfirmButton: true,
                confirmButtonText: 'Ok',
            }).then(() => {
                window.location.href = 'habitantes.php';
            });
        </script>";
    }

}
?>

