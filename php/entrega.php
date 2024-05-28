<?php require_once "vista_superior.php"; ?>
<link rel="stylesheet" href="../styles/styles.css">
<link rel="stylesheet" type="text/css" href="../styles/jquery.dataTables.css">
<link rel="stylesheet" href="../styles/sweetalert2.min.css">
<script src="../scripts/sweetalert2.all.min.js"></script>
<script src="../scripts/jquery-3.6.0.min.js"></script>
<title>Beneficios</title>
<div class="details section">
<!-- Agrega el botón con un identificador único -->
<button id="btnMostrarFormulario" class="btn">Registrar Entrega de Beneficio</button>

<!-- Agrega el formulario con un identificador único -->
<section id="formularioBeneficio" class="details formulario formulario-Beneficio_entrega" style="display: none;">
    <header>Registrar Entrega de Beneficio</header>
    <form action="entrega_beneficios.php" method="post">
        <div class="cardHeader">
            <h2>Datos de la Entrega</h2>
        </div>
        
        <div class="input-box">
            <label class="label" for="beneficio_id">
                <select id="beneficio_id" name="beneficio_id" required>
                    <option value="">Seleccione un beneficio</option>
                    <?php
                    include 'db.php';
                    $sql = "SELECT id_beneficio, nombre_beneficio FROM beneficios";
                    $result = $conn->query($sql);

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
                <select id="grupo_familiar_id" name="grupo_familiar_id" required>
                    <option value="">Seleccione un grupo familiar</option>
                    <?php
                    include 'db.php';
                    $sql = "SELECT id_grupo_flia, nombre_familia FROM grupos_familiares";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' . htmlspecialchars($row['id_grupo_flia']) . '">' . htmlspecialchars($row['nombre_familia']) . '</option>';
                        }
                    }
                    $conn->close();
                    ?>
                </select>
                <span class="label_name">Grupo Familiar</span>
            </label>
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

<script>
    // Obtener referencia al botón
    var btnMostrarFormulario = document.getElementById('btnMostrarFormulario');
    // Obtener referencia al formulario
    var formularioBeneficio = document.getElementById('formularioBeneficio');

    // Agregar evento clic al botón
    btnMostrarFormulario.addEventListener('click', function() {
        // Cambiar el estilo de visualización del formulario
        formularioBeneficio.style.display = 'block';
    });
</script>


