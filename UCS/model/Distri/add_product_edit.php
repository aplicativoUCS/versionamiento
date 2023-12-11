<?php
include '../conn/conexion.php';

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pedido      = $_POST["id_pedido"];
    $id_producto    = $_POST["id_producto"];
    $cantidad       = $_POST["cantidad"];
    $fecha_prod     = $_POST["fecha_prod"];    

    // Prepara la consulta SQL
    $sql = "INSERT INTO detalles_pedidos (id_pedido, id_producto, cantidad, fecha_prod) VALUES (?, ?, ?, ?)";
    // Prepara la declaración
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    // Vincula los parámetros
    $stmt->bind_param("iiss", $id_pedido, $id_producto, $cantidad, $fecha_prod);
    // Ejecuta la consulta
    if ($stmt->execute()) {
        header("Location: editar_pedido.php?id=$id_pedido");
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }
    // Cierra la declaración
    $stmt->close();
}
$conn->close();

?>