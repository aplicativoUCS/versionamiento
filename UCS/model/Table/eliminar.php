<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    // Realiza la conexión a la base de datos (debes configurar esto)
    $conexion = new mysqli("localhost", "root", "12345678", "ucs");

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }
    // Consulta SQL para eliminar el registro
    $sql = "DELETE FROM pedidos WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: pedidos.php");
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
    $conexion->close();
} else {
    echo "ID no válido";
}
?>