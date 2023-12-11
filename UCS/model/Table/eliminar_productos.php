<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_producto = $_GET['id'];
    // Realiza la conexión a la base de datos (debes configurar esto)
    $conexion = new mysqli("localhost", "root", "12345678", "ucs"); //    $conexion = new mysqli("localhost", "root", "12345678Ucs*", "id21569289_ucs"); Antigua contraseña

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }
    // Consulta SQL para eliminar el registro
    $sql = "DELETE FROM productos WHERE id = $id_producto";

    if ($conexion->query($sql) === TRUE) {
        header("Location: productos.php");
    } else {
        echo "Error al eliminar el registro: " . $conexion->error;
    }
    $conexion->close();
} else {
    echo "ID no válido";
}
?>