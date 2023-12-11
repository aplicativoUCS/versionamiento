<?php
$mysqli = new mysqli("localhost", "root", "12345678", "ucs");

if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}

if (isset($_GET['id'])) {
    $id_usuario = $mysqli->real_escape_string($_GET['id']);
    $consulta = "SELECT tipo_productos, Descripción, Marca, Modelo, Caracteristicas, Capacidad, Dispositivo, Medidas, Precio, Precio_publico, Precio_distribuidor FROM productos WHERE id = $id_usuario";
    
    $resultado = $mysqli->query($consulta);

    if ($resultado) {
        $datos_usuario = $resultado->fetch_assoc();
    } else {
        die("Error en la consulta: " . $mysqli->error);
    }
}

if (isset($_POST['btn'])) {
    $id_usuario = $mysqli->real_escape_string($_POST['id_usuario']);
    $tipo_productos = $mysqli->real_escape_string($_POST['tipo_productos']);
    $descripcion = $mysqli->real_escape_string($_POST['Descripción']);
    $marca = $mysqli->real_escape_string($_POST['Marca']);
    $modelo = $mysqli->real_escape_string($_POST['Modelo']);
    $caracteristicas = $mysqli->real_escape_string($_POST['Caracteristicas']);
    $capacidad = $mysqli->real_escape_string($_POST['Capacidad']);
    $dispositivo = $mysqli->real_escape_string($_POST['Dispositivo']);
    $medidas = $mysqli->real_escape_string($_POST['Medidas']);
    $precio = $mysqli->real_escape_string($_POST['Precio']);
    $precio_publico = $mysqli->real_escape_string($_POST['Precio_publico']);
    $precio_distribuidor = $mysqli->real_escape_string($_POST['Precio_distribuidor']);
    
    $actualizar_consulta = "UPDATE productos SET tipo_productos = '$tipo_productos', Descripción = '$descripcion', Marca = '$marca', Modelo = '$modelo', Caracteristicas = '$caracteristicas', Capacidad = '$capacidad', Dispositivo = '$dispositivo', Medidas = '$medidas', Precio = '$precio', Precio_publico = '$precio_publico', Precio_distribuidor = '$precio_distribuidor' WHERE id = $id_usuario";

    if ($mysqli->query($actualizar_consulta) === TRUE) {
        header("Location: Welcome.php");
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


    <form class="col-4 m-auto" method= "POST">

    <h3 class="text-center alert alert-secondary">Modificar Producto</h3>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">tipo_productos</label>
        <input type="text" class="form-control" name="tipo_productos" value="<?php echo $datos_usuario['tipo_productos']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Descripción</label>
        <input type="text" class="form-control" name="Descripción" value="<?php echo $datos_usuario['Descripción']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Marca</label>
        <input type="text" class="form-control" name="Marca" value="<?php echo $datos_usuario['Marca']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Modelo</label>
        <input type="text" class="form-control" name="Modelo" value="<?php echo $datos_usuario['Modelo']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Caracteristicas</label>
        <input type="text" class="form-control" name="Caracteristicas" value="<?php echo $datos_usuario['Caracteristicas']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Capacidad</label>
        <input type="text" class="form-control" name="Capacidad" value="<?php echo $datos_usuario['Capacidad']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Dispositivo</label>
        <input type="text" class="form-control" name="Dispositivo" value="<?php echo $datos_usuario['Dispositivo']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Medidas</label>
        <input type="text" class="form-control" name="Medidas"  value="<?php echo $datos_usuario['Medidas']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Precio</label>
        <input type="number" class="form-control" name="Precio" value="<?php echo $datos_usuario['Precio']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Precio_publico</label>
        <input type="number" class="form-control" name="Precio_publico"  value="<?php echo $datos_usuario['Precio_publico']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Precio_distribuidor</label>
        <input type="number" class="form-control" name="Precio_distribuidor" value="<?php echo $datos_usuario['Precio_distribuidor']; ?>">
    </div>

    <button type="submit" class="btn btn-primary" name="btn">Guardar</button>
    <a class="btn btn-small btn-success" href="Productos.php">volver</a>

    </form>

    <br>

</body>
</html>

