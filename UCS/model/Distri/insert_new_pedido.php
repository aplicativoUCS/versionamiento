<?php
include '../conn/conexion.php';
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_cliente      = $_POST["id_cliente"];
    $id_estado       = $_POST["id_estado"];
    $fecha_borrador  = $_POST["fecha_borrador"];
    // Prepara la consulta SQL
    $sql = "INSERT INTO pedidos (id_cliente, id_estado, fecha_borrador, num_pedido) VALUES (?, ?, ?, 0)";
    

    // Prepara la declaración
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    // Vincula los parámetros
    $stmt->bind_param("iss", $id_cliente, $id_estado, $fecha_borrador);
    // Ejecuta la consulta
    if ($stmt->execute()) {
        $sql = "SELECT id FROM pedidos WHERE id_cliente=$id_cliente
        ORDER BY id DESC
        LIMIT 1";
$resultado = $conn->query($sql);
while ($row = $resultado->fetch_assoc()) {
    $id_new_pedido = $row['id'];
}
$conn->close();
header("Location: new_pedido.php?id=$id_new_pedido");
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }
    // Cierra la declaración
    $stmt->close();
}


?>