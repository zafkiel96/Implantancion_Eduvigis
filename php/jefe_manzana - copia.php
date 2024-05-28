<?php require_once "vista_superior.php" ?> <!-- REGISTRAR -->
<link rel="stylesheet" href="../styles/styles.css">

<script>
    function mostrarFormulario(opcion) {
        var formularios = document.querySelectorAll('.formulario');
        formularios.forEach(function (formulario) {
            formulario.style.display = 'none';
        });

        var formularioMostrar = document.querySelector('.formulario-' + opcion);
        if (formularioMostrar) {
            formularioMostrar.style.display = 'block';
        }
    }
</script>

<div class="details section">
    <div class="recentRegisters">
        <div class="cardHeader">
            <h2>Registro</h2>
            <select id="registroType" onchange="mostrarFormulario(this.value)">
                <option value="">Seleccione una opción</option>
                <option value="Jefe_de_Manzana">Jefe de Manzana</option>
                <option value="Manzana">Manzana</option>
                <option value="Beneficio">Beneficio</option>
                <option value="Beneficio_entrega">Beneficio Entregado</option>
                <option value="Grupo_Familiar">Grupo Familiar</option>
            </select>
        </div>


        <section class="details formulario formulario-Jefe_de_Manzana" style="display: none;">
            <header>Registrar Jefe de Manzana</header>
            <form action="../Controlador/reg_jefe_manzana.php" method="post">
                <!-- Campos específicos para el registro de "Jefe de Manzana" -->
                <div class="cardHeader">
                        <h2>Datos Jefe de Manzana</h2>
                    </div>
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

        <section class="details formulario formulario-Manzana" style="display: none;">
            <header>Registrar Manzana</header>
            <form action="../Controlador/reg_manzana.php" method="post">
                <!-- Campos específicos para el registro de "Manzana" -->
                <div class="cardHeader">
                        <h2>Datos de la Manzana</h2>
                    </div>
                <!-- Campos específicos para el registro de "Jefe de Familia" -->
                    <div class="input-box">
                        <label class="label" for="cedula">
                            <input type="number" class="input" placeholder=" " id="numero_manzana" name="numero_manzana" required>
                            <span class="label_name">Numero de la Manzana</span>
                        </label>
                    </div>
                    <div class="input-box">
                        <label class="label" for="cedula">
                            <input type="text" class="input" placeholder=" " id="des_manzana" name="des_manzana" required>
                            <span class="label_name">Descripción de la Manzana</span>
                        </label>
                    <div class="input-box">
                        <label class="label" for="cedula">
                            <input type="text" class="input" placeholder=" " id="ob_manzana" name="ob_manzana" required>
                            <span class="label_name">Observación de la Manzana</span>
                        </label>
                    </div>
                <input type="submit" name="RegistrarManzana" value="Registrar Manzana">
            </form>
        </section>

        <section class="details formulario formulario-Beneficio" style="display: none;">
            <header>Registrar Beneficio</header>
            <form action="../Controlador/reg_new_beneficio.php" method="post">
                <!-- Campos específicos para el registro de "Beneficio" -->
                    <div class="cardHeader">
                        <h2>Datos del Beneficio</h2>
                    </div>
                    
                    <div class="input-box">
                        <label class="label" for="beneficio">
                            <input type="text" class="input" placeholder=" " id="beneficio_nuevo" name="beneficio_nuevo" required>
                            <span class="label_name">Nombre del Beneficio</span>
                        </label>
                    </div>
                <input type="submit" name="RegistrarBeneficio" value="Registrar Beneficio">
            </form>
        </section>

        <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<section class="details formulario formulario-Beneficio_entrega" style="display: none;">
    <header>Registrar Entrega de Beneficio</header>
    <form action="../Controlador/entrega_beneficios.php" method="post">
        <div class="cardHeader">
            <h2>Datos de la Entrega</h2>
        </div>
        <div class="input-box">
            <label class="label" for="beneficio_id">
                <select id="beneficio_id" name="beneficio_id" required>
                    <option value="">Seleccione un beneficio</option>
                    <?php
                    include '../Controlador/conexion.php';
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT id_beneficio, nombre_beneficio FROM beneficios";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        die("Error in SQL query: " . $conn->error);
                    }

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' . htmlspecialchars($row['id_beneficio']) . '">' . htmlspecialchars($row['nombre_beneficio']) . '</option>';
                        }
                    }
                    $conn->close();
                    ?>
                </select>
                <span class="label_name">Beneficio Entregado</span>
            </label>
        </div>

        <div class="input-box">
            <label class="label" for="grupo_familiar_id">
            <label for="grupo_familiar_id">Seleccione un grupo familiar:</label>
        <select id="grupo_familiar_id" name="grupo_familiar_id" required>
            <option value="">Seleccione un grupo familiar</option>
            <?php
            include '../Controlador/conexion.php';

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
            <label class="label" for="descripcion">
                <input type="text" class="input" placeholder=" " id="descripcion" name="descripcion" required>
                <span class="label_name">Descripción</span>
            </label>
        </div>

        <div class="input-box">
            <label class="label" for="observacion">
                <input type="text" class="input" placeholder=" " id="observacion" name="observacion" required>
                <span class="label_name">Observación</span>
            </label>
        </div>

        <input type="submit" name="RegistrarEntrega" value="Registrar Entrega">
    </form>
</section>



<section id="rgfamiliar" class="details formulario formulario-Grupo_Familiar" style="display: none;">
  <header>Registrar Grupo Familiar</header>
  <form id="formulario" action="../Controlador/rgfamiliar.php" method="post">
    <div class="cardHeader">
      <h2>Datos Grupo Familiar</h2>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="grupo_familiar" name="grupo_familiar" required>
        <span class="label_name">Ingresar Nombre del Grupo Familiar</span>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="direccion_vivienda" name="direccion_vivienda" required>
        <span class="label_name">Dirección de su vivienda</span>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="numero_casa" name="numero_casa" required>
        <span class="label_name">Número Casa</span>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="anexo" name="anexo" required>
        <span class="label_name">Anexo</span>
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
    <div id="miembros">
      <div class="cardHeader">
        <h2>Datos del Primer Miembro</h2>
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
        <label class="label">
          <input type="text" class="input" placeholder=" " id="nombre" name="nombre[]" required>
          <span class="label_name">Nombre</span>
        </label>
      </div>
      <div class="input-box">
        <label class="label">
          <input type="text" class="input" placeholder=" " id="segundo_nombre" name="segundo_nombre[]">
          <span class="label_name">Segundo Nombre</span>
        </label>
      </div>
      <div class="input-box">
        <label class="label">
          <input type="text" class="input" placeholder=" " id="apellidos" name="apellidos[]" required>
          <span class="label_name">Primer Apellido</span>
        </label>
      </div>
      <div class="input-box">
        <label class="label">
          <input type="text" class="input" placeholder=" " id="segundo_apellido" name="segundo_apellido[]">
          <span class="label_name">Segundo Apellido</span>
        </label>
      </div>
      <div class="input-box">
        <label for="jefeFamilia" class="label">¿Es usted el jefe de familia?
          <select id="jefeFamilia" name="jefeFamilia" required>
            <option value="">Seleccione una opción</option>
            <option value="si">Sí</option>
            <option value="no">No</option>
          </select>
        </label>
      </div>
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
        <label class="label">
          <input type="text" class="input" placeholder=" " id="cedula" name="cedula[]" required>
          <span class="label_name">Cédula</span>
        </label>
      </div>
      <div class="input-box">
                        <label class="label" for="cedula">
                            <input type="date" name="fecha_nacimiento" class="input" placeholder=" " required>
                            <span class="label_name">Fecha de Nacimiento</span>
                        </label>
                    </div>
      <div class="input-box">
        <label class="label">
          <input type="email" class="input" placeholder=" " id="correo" name="correo[]" required>
          <span class="label_name">Correo Electrónico</span>
        </label>
      </div>
      <div class="input-box">
        <label class="label">
          <input type="text" class="input" placeholder=" " id="serial" name="serial[]" required>
          <span class="label_name">Serial del Carnet de la Patria</span>
        </label>
      </div>
      <div class="input-box">
        <label class="label">
          <input type="text" class="input" placeholder=" " id="codigo" name="carnet[]" required>
          <span class="label_name">Código del Carnet de la Patria</span>
        </label>
      </div>
      <div class="input-box">
        <label class="label">
          <input type="text" class="input" placeholder=" " id="discapacidad" name="discapacidad[]">
          <span class="label_name">Discapacidad</span>
        </label>
      </div>
      <div class="input-box">
        <label for="genero" class="label">Género:
          <select id="genero" name="genero[]">
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
          </select>
        </label>
      </div>
      <div class="input-box">
        <label class="label">
          <input type="text" class="input" placeholder=" " id="telefono" name="telefono[]" required>
          <span class="label_name">Teléfono</span>
        </label>
      </div>
      <div class="input-box">
        <label class="label">
          <input type="text" class="input" placeholder=" " id="numero_hijos" name="numero_hijos[]" required>
          <span class="label_name">Número de Hijos</span>
        </label>
      </div>
    </div>
    <button type="button" id="agregarMiembro">Agregar otro miembro</button><br><br>
    <input type="submit" value="Enviar">
  </form>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.js"></script>
<script>
  flatpickr(".flatpickr", {
    dateFormat: "d-m-Y"
  });

  document.getElementById("agregarMiembro").addEventListener("click", function() {
    var formulario = document.getElementById("miembros");
    var nuevoMiembro = document.createElement("div");
    nuevoMiembro.className = "input-box";
    nuevoMiembro.innerHTML = `
    <hr>
    <div class="cardHeader">
      <h2>Datos de otro Miembro de la Familia</h2>
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
      <label class="label">
        <input type="text" class="input" placeholder=" " id="nombre" name="nombre[]" required>
        <span class="label_name">Nombre</span>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="segundo_nombre" name="segundo_nombre[]">
        <span class="label_name">Segundo Nombre</span>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="apellidos" name="apellidos[]" required>
        <span class="label_name">Primer Apellido</span>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="segundo_apellido" name="segundo_apellido[]">
        <span class="label_name">Segundo Apellido</span>
      </label>
    </div>
    <div class="input-box">
      <label for="jefeFamilia" class="label">¿Es usted el jefe de familia?
        <select id="jefeFamilia" name="jefeFamilia" required>
          <option value="">Seleccione una opción</option>
          <option value="si">Sí</option>
          <option value="no">No</option>
        </select>
      </label>
    </div>
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
      <label class="label">
        <input type="text" class="input" placeholder=" " id="cedula" name="cedula[]" required>
        <span class="label_name">Cédula</span>
      </label>
    </div>
    <div class="input-box">
                        <label class="label" for="cedula">
                            <input type="date" name="fecha_nacimiento" class="input" placeholder=" " required>
                            <span class="label_name">Fecha de Nacimiento</span>
                        </label>
                    </div>
    <div class="input-box">
      <label class="label">
        <input type="email" class="input" placeholder=" " id="correo" name="correo[]" required>
        <span class="label_name">Correo Electrónico</span>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="serial" name="serial[]" required>
        <span class="label_name">Serial del Carnet de la Patria</span>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="codigo" name="carnet[]" required>
        <span class="label_name">Código del Carnet de la Patria</span>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="discapacidad" name="discapacidad[]">
        <span class="label_name">Discapacidad</span>
      </label>
    </div>
    <div class="input-box">
      <label for="genero" class="label">Género:
        <select id="genero" name="genero[]">
          <option value="masculino">Masculino</option>
          <option value="femenino">Femenino</option>
          <option value="otro">Otro</option>
        </select>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="telefono" name="telefono[]" required>
        <span class="label_name">Teléfono</span>
      </label>
    </div>
    <div class="input-box">
      <label class="label">
        <input type="text" class="input" placeholder=" " id="numero_hijos" name="numero_hijos[]" required>
        <span class="label_name">Número de Hijos</span>
      </label>
    </div>
    `;
    formulario.appendChild(nuevoMiembro);
    flatpickr(".flatpickr", {
      dateFormat: "d-m-Y"
    });
  });
</script>

    </div>
</div>