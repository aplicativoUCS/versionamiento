<?php
// Verificar si se ha proporcionado un ID válido
if (isset($_POST['id_producto']) && is_numeric($_POST['id_producto'])) {
    $id_a_eliminar = $_POST['id_producto'];

    // Aquí debes realizar la conexión a tu base de datos
    include '../conn/conexion.php';

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Escapar el ID para prevenir inyección SQL (aunque en este caso es un número, es una buena práctica)
    $id_a_eliminar = $conn->real_escape_string($id_a_eliminar);

    // Construir la consulta para eliminar el registro
    $sql = "DELETE FROM detalles_pedidos WHERE id = $id_a_eliminar";

    if ($conn->query($sql) === TRUE) {
        // Obtener el ID dinámico de la URL actual
        $id_pedido = $_POST['id_pedido'];

        // Redirigir a la página principal después de eliminar
        header("Location: ../Distri/editar_pedido.php?id=" . $id_pedido);
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID no válido proporcionado.";
}
?>