<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    include 'conexion.php';
    $sql = "SELECT usuario FROM usuarios WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($usuario);
    $stmt->fetch();
    $stmt->close();
} else {
    header("Location: ../../index.php");
    exit;
}
?>
<head>
    <link rel="shortcut icon" href="../../img/ico.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/styles.css">
    <link rel="stylesheet" href="../../styles/sweetalert2.min.css">
    <script src="../../scripts/sweetalert2.all.min.js"></script>
    <link href='../../styles/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../styles/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                    <img src="../../img/ico.png" width="70" height="35" style="margin-top: 20px;">
                        <span class="title">Santa Eduvigis</span>
                    </a>
                </li>
                <li>
                    <a href="../dashboard.php">
                        <span class="title"><i style="width: 77%;font-size: 34px;" class="fa-solid fa-house"></i>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="../beneficio.php">
                        <span class="title"><i style="width: 55%;font-size: 34px;" class="fa-solid fa-school"></i>Beneficios</span>
                    </a>
                </li>
                <li>
                    <a href="../habitantes/personas.php">
                        <span class="title"><i style="width: 55%;font-size: 34px;" class="fa-solid fa-address-card"></i>Habitantes</span>
                    </a>
                </li>
                <li>
                    <a href="grpfamiliar.php">
                        <span class="title"><i style="width: 38%;font-size: 34px;" class="fa-solid fa-address-card"></i>Grupos Familiares</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                <i class="fa-solid fa-bars"></i>
                </div>
                <div class="user">
                    <img src="../../img/user.png" alt="User Image">
                    <button id="logoutBut" class="button alternative" data-hover="Cerrar Sesión"><?php echo $usuario; ?></button>
                </div>
            </div>
            <form id="logoutForm" action="../../controlador/logout.php" method="post" style="display: none;"></form>
            <script src="../../scripts/dash.js"></script>
            <script>
                document.getElementById("logoutBut").addEventListener("click", function(event){
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¿Que deseas cerrar la sesión?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, cerrar sesión',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById("logoutForm").submit();
                        }
                    });
                });
            </script>
</body>