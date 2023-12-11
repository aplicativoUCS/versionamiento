<?php
include '../conn/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_estado = $_POST["id_estado"];
    $id_pedido = $_POST["id_pedido"];
    $num_pedido = $_POST["num_pedido"];
    $fecha_solicitud = $_POST["fecha_solicitud"];
    // Actualiza las columnas específicas
    $sql = "UPDATE pedidos SET id_estado = ?, num_pedido = ?, fecha_solicitud = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    // Vincula los parámetros
    $stmt->bind_param("iisi", $id_estado, $num_pedido, $fecha_solicitud, $id_pedido);
    // Ejecuta la consulta de actualización
    if ($stmt->execute()) {

        include("sendemail.php");
        $mail_username = "pedidosucs@gmail.com"; //Correo electronico saliente ejemplo: tucorreo@gmail.com
        $mail_userpassword = "ipqy hoyt onde eqrq"; //Tu contraseña de gmail
        $mail_addAddress = "pedidosucs@gmail.com"; //correo electronico que recibira el mensaje
        $template = "email_template.html"; //Ruta de la plantilla HTML para enviar nuestro mensaje
        $mail_setFromEmail = "El usuario" . $_SESSION['usuario'];
        $mail_setFromName = $_POST['customer_name'];
        $txt_message = $_POST['message'];
        $mail_subject = $_POST['subject'];
        sendemail($mail_username, $mail_userpassword, $mail_setFromEmail, $mail_setFromName, $mail_addAddress, $txt_message, $mail_subject, $template);

        echo '<script type="text/javascript">alert("¡Su pedido se ha realizado exitosamente!");window.location = "panel_distri.php";</script>';
        // header("Location: panel_distri.php");
        exit();
    } else {
        echo "Error al actualizar el pedido: " . $stmt->error;
    }

    // Cierra la declaración
    $stmt->close();


}

$conn->close();
?>