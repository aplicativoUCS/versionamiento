<?php

include '../conn/conexion.php';

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
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
    <title>Productos</title>
</head>
<body>

    <br>

<form class="col-4 m-auto" method="POST">
            <h3 class="text-center alert alert-secondary">Registrar Producto</h3>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo Producto</label>
                <input type="text" class="form-control" name="tipo_productos" required>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="Descripción" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Marca</label>
                <input type="text" class="form-control" name="Marca" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="Modelo" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Caracteristicas</label>
                <input type="text" class="form-control" name="Caracteristicas" required>
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
                <input type="text" class="form-control" name="Medidas" required>
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
                <input type="text" class="form-control" name="Stock" required>
            </div>

            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ubicación</label>
                <div class="mb-3">
                    <select class="form-control" name="id_ubicacion" required>
                        <option value="" disabled selected>Selecciona una Ubicación</option>
                        <option value="1">Comuneros primer piso</option>
                        <option value="2">Comuneros segundo piso</option>
                        <option value="3">Las américas</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio Publico</label>
                <input type="number" class="form-control" name="Precio_publico" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio Distribuidor</label>
                <input type="number" class="form-control" name="Precio_distribuidor" required>
            </div>

            <button type="submit" class="btn btn-primary" name="btn">Subir</button>
            <a class="btn btn-small btn-success" href="productos.php">volver</a>
        </form>

</body>
</html>

<br>

<?php

include '../conn/conexion.php';


if (isset($_POST['btn'])) {
    // Obtener los valores del formulario
    $tipo_productos = $_POST['tipo_productos'];
    $descripcion = $_POST['Descripción'];
    $marca = $_POST['Marca'];
    $modelo = $_POST['Modelo'];
    $caracteristicas = $_POST['Caracteristicas'];
    $capacidad = $_POST['Capacidad'];
    $dispositivo = $_POST['Dispositivo'];
    $medidas = $_POST['Medidas'];
    $producto = $_POST['Producto'];
    $stock = $_POST['Stock'];
    $Ubicacion = $_POST['id_ubicacion'];
    $precio_publico = $_POST['Precio_publico'];
    $precio_distribuidor = $_POST['Precio_distribuidor'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO productos (tipo_productos, Descripción, Marca, Modelo, Caracteristicas, Capacidad, Dispositivo, Medidas, Producto, Stock, id_ubicacion, Precio_publico, Precio_distribuidor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("sssssssssssss", $tipo_productos, $descripcion, $marca, $modelo, $caracteristicas, $capacidad, $dispositivo, $medidas, $producto, $stock, $Ubicacion, $precio_publico, $precio_distribuidor);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo '<p style="color: green;">Producto registrado correctamente</p>';
    } else {
        echo "Error al registrar el producto: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión después de realizar todas las operaciones
$conn->close();
?>
