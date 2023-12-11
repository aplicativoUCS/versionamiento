<?php
session_start();
include '../conn/conexion.php';
if (isset($_SESSION['usuario'])) {
    $queryid = "SELECT id, Correo, rol FROM usuarios WHERE nombre = '" . $_SESSION['usuario'] . "'";
    $resultid = $conn->query($queryid);
    while ($row = $resultid->fetch_assoc()) {
        $id = $row['id'];
        $correo = $row['Correo'];
        $rol = $row['rol'];
    }
} else {
    echo '<script type="text/javascript">alert("¡Inicie sesión para ver esta página!");window.location = "../Login-Register/login.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/welcome.css">
</head>

<menu>
    <div class="container-head">
        <img src="../img/ucs.png" style="width: 90px;">

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar"><i class='bx bx-menu-alt-right'></i></label>

        <?php
        switch ($rol) {
            case '1':
                ?>
        <nav class="navbar">
            <ul>
                <!-- <li><a>
                    <?php echo $_SESSION['usuario'] ?>
                </a></li> -->
                <li><a href="welcome.php">Inicio <i class='bx bxs-home' ></i></a></li>
                <li><a href="usuarios.php">Usuarios <i class='bx bxs-user' ></i></a></li>
                <li><a href="productos.php">Administrar Productos <i class='bx bxs-cart-alt' ></i></a></li>
                <li><a href="pedidos.php">Ver Pedidos <i class='bx bxs-show' ></i></a></li>
                <li><a href="../Login-Register/logout.php">Cerrar Sesión <i class='bx bx-power-off' ></i></a></li>
            </ul>
        </nav>
        <?php
                break;

            case '2':
                ?>
        <nav class="navbar">
            <ul>
                <li><a>
                    <?php echo '<td> Bienvenido </td>' . $_SESSION['usuario'] ?>
                </a></li>

                <li><a href="../Distri/panel_distri.php">Inicio <i class='bx bxs-home'></i></a></li>

                <li><a href="../Login-Register/logout.php">Cerrar Sesión <i class='bx bx-power-off' ></i></a></li>
            </ul>
        </nav>
        <?php
                break;
        }
        ?>
    </div>
</menu><br><br><br>