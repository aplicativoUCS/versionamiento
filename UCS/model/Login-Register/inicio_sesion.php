<?php
session_start();

require '../conn/conexion.php';

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $pass_encript = md5($pass);


    $sql = "SELECT * FROM usuarios WHERE Nombre='$usuario' AND Pass='$pass_encript'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        $rol = $row['rol'];

        $_SESSION['usuario'] = $usuario;

        if ($rol == 1) {
            header("Location: ../Table/Welcome.php");
        } elseif ($rol == 2) {
            header("Location: ../Distri/panel_distri.php");
        }
        exit();
    } else {
        echo '<script type="text/javascript">alert("¡Usuario o Contraseña Incorrectos!");window.location = "login.php";</script>';
    }
}

$conn->close();

?>