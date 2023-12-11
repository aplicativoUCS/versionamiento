<?php
// Conexión a la base de datos (debes tener tus propias credenciales)
include '../conn/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Obtener el ID del registro a eliminar desde la URL
$id = $_GET['id'];

// Consulta SQL para eliminar el registro
$sql = "DELETE FROM pedidos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../Distri/panel_distri.php");
}

// Cerrar la conexión
$conn->close();
?>
