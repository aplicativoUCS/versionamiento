<?php

$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "ucs";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['Nombre'];
    $ciudad = $_POST['Ciudad'];
    $correo = $_POST['Correo'];
    $empresa = $_POST['Empresa'];
    $direccion = $_POST['Direccion'];
    $telefono = $_POST['Telefono'];
    $nit = $_POST['Nit'];
    $pass = $_POST['Pass'];
    $pass_encript = md5($pass);
    $rol = 2;

    $sql = "INSERT INTO usuarios (Nombre, Ciudad, Correo, Empresa, Direccion, Telefono, Pass, rol, nit) VALUES ('$nombre', '$ciudad', '$correo', '$empresa', '$direccion', '$telefono', '$pass_encript', $rol, '$nit')";

    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("Usted se ha registrado exitosamente");</script>';
        header("Location: register.php");
        exit();
    } else {
        echo "Error al insertar datos en la base de datos: " . $conn->error;
    }
}

$conn->close();
?>
