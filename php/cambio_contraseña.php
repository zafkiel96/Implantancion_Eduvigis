<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="../img/ico.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/bootstrap.min.css.map">
    <link rel="stylesheet" href="../styles/style_login.css">
    <link href='../styles/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/css/all.min.css">
    <link rel="stylesheet" href="../styles/sweetalert2.min.css">
    <title>Recuperar contraseña</title>
</head>
<body>
<div class="form-container">
  <div class="col col-1">
    <div class="image-layer">
      <img src="../img/full-moon.png" class="form-image-main fi-2" alt="">
    </div>
  </div>
  <div class="col col-2">
        <form id="changePasswordForm" action="../controlador/control_cambio_contraseña.php" method="post">    
            <div class="login-form show">
                <div class="form-title">
                    <span>Recuperar contraseña</span>
                </div>
                <div class="form-inputs">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Usuario" id="usrname" name="usrname" required>
                        <i class="bx bx-user icon"></i>
                    </div>
                    <div class="input-box">
                    <input type="text" class="input-field" placeholder="Cédula de Identidad (C.I)" id="ci" name="ci" required pattern="\d*" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        <i class="bx bx-id-card icon"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Contraseña Nueva" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número, una letra mayúscula y una letra minúscula, y al menos 8 caracteres" required>
                        <i class="bx bx-lock-alt icon"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Confirmar Contraseña" id="confirm_psw" name="confirm_psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número, una letra mayúscula y una letra minúscula, y al menos 8 caracteres" required>
                        <i class="bx bx-lock-alt icon"></i>
                    </div>
                    <div class="input-box">
                        <input class="input-submit" type="submit" value="Enviar">
                    </div>
                </div>
                <div class="forget-pass">
                    <a class="btn btn-2" href="../index.php">Iniciar Sesión</a>
                </div>
            </div>
        </form>
    </div>
    <script src="../scripts/sweetalert2.all.min.js"></script>
    <script>
        document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = '../index.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                        showConfirmButton: true
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</div>
<script src="../scripts/script_login.js"></script>
</body>
</html>