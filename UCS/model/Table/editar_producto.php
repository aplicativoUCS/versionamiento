<?php
$mysqli = new mysqli("localhost", "root", "12345678", "ucs"); //$conexion = new mysqli("localhost", "root", "12345678Ucs*", "id21569289_ucs"); Antigua contraseña


if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}

if (isset($_GET['id'])) {
    $id_producto = $mysqli->real_escape_string($_GET['id']);
    $consulta = "SELECT tipo_productos, Descripción, Marca, Modelo, Caracteristicas, Capacidad, Dispositivo, Medidas, Producto, Stock, id_Ubicacion, precio_publico, Precio_distribuidor FROM productos WHERE id = $id_producto"; 

    $resultado = $mysqli->query($consulta);

    if ($resultado) {
        $datos_usuario = $resultado->fetch_assoc();
    } else {
        die("Error en la consulta: " . $mysqli->error);
    }
}

if (isset($_POST['btn'])) {
    $tipo_productos = $mysqli->real_escape_string($_POST['tipo_productos']);
    $Descripción = $mysqli->real_escape_string($_POST['Descripción']);
    $Marca = $mysqli->real_escape_string($_POST['Marca']);
    $Modelo = $mysqli->real_escape_string($_POST['Modelo']);
    $Caracteristicas = $mysqli->real_escape_string($_POST['Caracteristicas']);
    $Capacidad = $mysqli->real_escape_string($_POST['Capacidad']);
    $Dispositivo = $mysqli->real_escape_string($_POST['Dispositivo']);
    $Medidas = $mysqli->real_escape_string($_POST['Medidas']);
    $Producto = $mysqli->real_escape_string($_POST['Producto']);
    $Stock = $mysqli->real_escape_string($_POST['Stock']);
    $Ubicacion = $mysqli->real_escape_string($_POST['id_ubicacion']);
    $Precio_publico = $mysqli->real_escape_string($_POST['precio_publico']);
    $Precio_distribuidor = $mysqli->real_escape_string($_POST['Precio_distribuidor']);


    $actualizar_consulta = "UPDATE productos SET tipo_productos = '$tipo_productos', Descripción = '$Descripción', Marca = '$Marca', Modelo = '$Modelo', Caracteristicas = '$Caracteristicas', Capacidad = '$Capacidad',
    Dispositivo = '$Dispositivo', Medidas = '$Medidas', Producto = '$Producto', Stock = '$Stock', id_ubicacion = '$Ubicacion', precio_publico = '$Precio_publico', Precio_distribuidor = '$Precio_distribuidor' WHERE id = $id_producto";

    if ($mysqli->query($actualizar_consulta) === TRUE) {

        header("Location: productos.php");
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
    <title>Editar Producto</title>
</head>
<body>

<br>
<form class="col-4 m-auto" method="POST">

<h3 class="text-center alert alert-secondary">Productos</h3>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tipo de Producto</label>
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
    <input type="text" class="form-control form-control" name="Caracteristicas" value="<?php echo $datos_usuario['Caracteristicas']; ?>">
</div>

<div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Capacidad</label>
                <div class="mb-3">
                    <select class="form-control" name="Capacidad" required>
                        <option value="" disabled selected>Selecciona una Ubicacion</option>
                        <option value="DDR3 4GB">DDR3 4GB</option>
                        <option value="DDR4 4GB">DDR4 4GB</option>
                        <option value="DDR3 8GB">DDR3 8GB</option>
                        <option value="DDR4 8GB">DDR4 8GB</option>
                        <option value="DDR3 16GB">DDR3 16GB</option>
                        <option value="DDR4 16GB" >DDR4 16GB</option>
                        <option value="DDR3 32GB" >DDR3 32GB</option>
                        <option value="DDR4 32GB" >DDR4 32GB</option>
                        <option value="N/A">N/A</option>
                    </select>
                </div>
        </div>

        <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Dispositivo</label>
                <div class="mb-3">
                    <select class="form-control" name="Dispositivo" required>
                        <option value="" disabled selected>Selecciona un dispositivo</option>
                        <option value="PC">PC</option>
                        <option value="Portatil">Portatil</option>
                        <option value="PC y Portatil">PC y Portatil</option>
                        <option value="Otros">Otros</option>
                        <option value="Varios">Varios</option>
                        <option value="N/A">N/A</option>

                    </select>
                </div>
        </div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Medidas</label>
    <input type="text" class="form-control" name="Medidas" value="<?php echo $datos_usuario['Medidas']; ?>">
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Producto</label>
        <div class="mb-3">
            <select class="form-control" name="Producto" required>
                <option value="" disabled selected>Como es el producto?</option>
                <option value="Nuevo">Nuevo</option>
                <option value="Usado">Usado</option>
            </select>
        </div>
</div>


<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Stock</label>
    <input type="number" class="form-control" name="Stock" value="<?php echo $datos_usuario['Stock']; ?>">
</div>

<div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ubicación</label>
                <div class="mb-3">
                    <select class="form-control" name="id_ubicacion" required>
                        <option value="" disabled selected>Selecciona una Ubicacion</option>
                        <option value="1">Comuneros primer piso</option>
                        <option value="2">Comuneros segundo piso</option>
                        <option value="3">Las Americas</option>
                    </select>
                </div>
        </div>


<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Precio Público</label>
    <input type="text" class="form-control" name="precio_publico" value="<?php echo $datos_usuario['precio_publico']; ?>">
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Precio Distribuidor</label>
    <input type="text" class="form-control" name="Precio_distribuidor" value="<?php echo $datos_usuario['Precio_distribuidor']; ?>">
</div>

<button type="submit" class="btn btn-primary" name="btn">Guardar</button>
<a class="btn btn-small btn-success" href="productos.php">volver</a>

</form>


</body>
</html>

<br>