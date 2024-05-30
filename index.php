<?php ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="shortcut icon" href="img/ico.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/bootstrap.min.css">
  <link href='styles/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="styles/css/all.min.css">
  <link rel="stylesheet" href="./styles/style_login.css">
  <link rel="stylesheet" href="styles/sweetalert2.min.css">
  <title>Iniciar sesión</title>
</head>
<body>
  <div class="form-container">
    <div class="col col-1">
      <div class="image-layer">
        <img src="./img/full-moon.png" class="form-image-main fi-2" alt="">
      </div>
    </div>
    <div class="col col-2">
        <form id="loginForm" action="controlador/validar.php" method="post">
            <div class="login-form">
                <div class="form-title">
                    <span>Iniciar sesión</span>
                </div>
                <div class="form-inputs">
                    <div class="input-box">
                        <br>
                        <input type="text" class="input-field" placeholder="Usuario" id="usrname" name="usrname" required>
                        <i class="bx bx-user icon"></i>
                    </div>
                    <div class="input-box">
                        <br>
                        <input type="password" class="input-field" placeholder="Contraseña" id="psw" name="psw" required>
                        <i class="bx bx-lock-alt icon"></i>
                        <a class="btn btn-2" onclick="myFunction()">Mostrar Contraseña <i class="fa-regular fa-eye"></i></a>
                    </div>
                    <div class="input-box">
                        <input class="input-submit" type="submit" value="Ingresar">
                    </div>
                </div>
                <div class="forget-pass">
                    <a class="btn btn-2" href="php/cambio_contraseña.php">Recuperar Contraseña?</a>
                </div>
            </div>
        </form>
    </div>
    <script src="scripts/sweetalert2.all.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
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
                        text: 'Ingreso exitoso',
                        showConfirmButton: false,
                        timer: 1000
                    }).then(() => {
                        window.location.href = 'php/dashboard.php';
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
  <script src="./scripts/script_login.js"></script>
</body>
</html>