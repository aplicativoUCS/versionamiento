<?php
$mysqli = new mysqli("localhost", "root", "12345678", "ucs"); //("localhost", "root", "12345678Ucs*", "id21569289_ucs") Antigua contraseña

if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}

if (isset($_GET['id'])) {
    $id_usuario = $mysqli->real_escape_string($_GET['id']);
    $consulta = "SELECT Nombre, Ciudad, Correo, Empresa, Direccion, Telefono, Rol, Nit FROM usuarios WHERE id = $id_usuario"; 

    $resultado = $mysqli->query($consulta);

    if ($resultado) {
        $datos_usuario = $resultado->fetch_assoc();
    } else {
        die("Error en la consulta: " . $mysqli->error);
    }
}

if (isset($_POST['btn'])) {
    $nombre = $mysqli->real_escape_string($_POST['Nombre']);
    $ciudad = $mysqli->real_escape_string($_POST['Ciudad']);
    $correo = $mysqli->real_escape_string($_POST['Correo']);
    $empresa = $mysqli->real_escape_string($_POST['Empresa']);
    $direccion = $mysqli->real_escape_string($_POST['Direccion']);
    $telefono = $mysqli->real_escape_string($_POST['Telefono']);
    $rol = $mysqli->real_escape_string($_POST['Rol']);
    $nit = $mysqli->real_escape_string($_POST['Nit']);

    $actualizar_consulta = "UPDATE usuarios SET Nombre = '$nombre', Ciudad = '$ciudad', Correo = '$correo', Empresa = '$empresa', Direccion = '$direccion', Telefono = '$telefono', Rol = '$rol', Nit = '$nit' WHERE id = $id_usuario";

    if ($mysqli->query($actualizar_consulta) === TRUE) {

        header("Location: usuarios.php");
        exit;
    } else {
        echo "Error en la actualización: " . $mysqli->error;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>


<form class="col-8 m-auto" method="POST">

<h3 class="text-center alert alert-secondary">Usuarios</h3>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="<?php echo $datos_usuario['Nombre']; ?>">
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ciudad</label>
    <input type="text" class="form-control" name="Ciudad" value="<?php echo $datos_usuario['Ciudad']; ?>">
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo</label>
    <input type="text" class="form-control" name="Correo" value="<?php echo $datos_usuario['Correo']; ?>">
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Empresa</label>
    <input type="text" class="form-control" name="Empresa" value="<?php echo $datos_usuario['Empresa']; ?>">
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Direccion</label>
    <input type="text" class="form-control" name="Direccion" value="<?php echo $datos_usuario['Direccion']; ?>">
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Telefono</label>
    <input type="text" class="form-control" name="Telefono" value="<?php echo $datos_usuario['Telefono']; ?>">
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Rol</label>
    <input type="text" class="form-control" name="Rol" value="<?php echo $datos_usuario['Rol']; ?>">
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nit</label>
    <input type="text" class="form-control" name="Nit" value="<?php echo $datos_usuario['Nit']; ?>">
</div>

<button type="submit" class="btn btn-primary" name="btn">Guardar</button>
<a class="btn btn-small btn-success" href="usuarios.php">volver</a>

</form>


</body>
</html>

