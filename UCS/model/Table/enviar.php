<?php
include("../conn/conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_estado          = '3';
    $id_pedido          = $_POST["id_pedido"];  
    $fecha_despachado   = $_POST["fecha_despachado"];      
    $Guia               = $_POST["Guia"];
    $id_pedido          = $_POST['id_pedido'];
    $correo_distri      = $_POST["Correo_distri"];

    // Verificar si $id_pedido es un número entero
    if (!ctype_digit($id_pedido)) {
        die("Error: El ID del pedido no es válido.");
    }
    // Consulta SQL para actualizar el pedido
    $sql = "UPDATE pedidos SET id_estado = ?, fecha_despachado = ?, Guia = ? WHERE id = ?";
    // Preparar la declaración
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    // Vincular los parámetros
    $stmt->bind_param("ssss", $id_estado, $fecha_despachado, $Guia, $id_pedido);
    // Ejecutar la consulta
    if ($stmt->execute()) {

        include("send.php");
        $mail_username = "pedidosucs@gmail.com"; //Correo electronico saliente ejemplo: tucorreo@gmail.com
        $mail_userpassword = "ipqy hoyt onde eqrq"; //Tu contraseña de gmail
        $mail_addAddress = $_POST['correo']; //correo electronico que recibira el mensaje
        $template = "email_template.html"; //Ruta de la plantilla HTML para enviar nuestro mensaje
        $mail_setFromEmail = "El usuario" . $_SESSION['usuario'];
        $mail_setFromName = $_POST['customer_name'];
        $txt_message = $_POST['message'];
        $mail_subject = $_POST['subject'];
        sendemail($mail_username, $mail_userpassword, $mail_setFromEmail, $mail_setFromName, $mail_addAddress, $txt_message, $mail_subject, $template);

        echo '<script type="text/javascript">alert("¡Su pedido se ha realizado exitosamente!");window.location = "panel_distri.php";</script>';
        header("Location: pedidos.php");
        exit();
    } else {
        echo "Error al actualizar el pedido: " . $stmt->error;
    }
       // Cierra la declaración
    $stmt->close();

}

$conn->close();
?>