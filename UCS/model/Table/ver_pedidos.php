<?php
session_start();
$id_pedido=$_GET['id'];
$id_estado_pedido=$_GET['estado'];
$Guia=$_GET['guia'];
$fecha_despachado=$_GET['fsp'];

include ('../conn/conexion.php'); 
include "../includes/head.php";

$query = "SELECT u.Nombre AS name, Correo AS Correo_distri, u.Empresa AS emp, u.Direccion AS dc, u.Telefono AS tel FROM pedidos AS p
        INNER JOIN usuarios AS u
        ON p.id_cliente=u.id
        WHERE p.id='$id_pedido'";
$result = $conn->query($query); 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $correo_distri = $row["Correo_distri"];
        echo "<tr>";
        echo '<div class="alert alert-success col-sm-3 container m-auto" role="alert">';
        echo "<td> <strong> Solicitado por: </strong>" . $row["name"] . "</td><br>";
        echo "<td> <strong> Empresa:        </strong>" . $row["emp"]  . "</td><br>";   
        echo "<td> <strong> Dirección:      </strong>" . $row["dc"]   . "</td><br>";
        echo "<td> <strong> Telefono:       </strong>" . $row["tel"]  . "</td><br>";
        echo "<td> <strong> Correo:         </strong>" . $correo_distri  . "</td><br>";
        echo "</div>";
        echo "</tr>";                
    }
} else {
    echo "<tr><td colspan='8'>Aun no se han hecho pedidos.</td></tr>";
}
?>

<title>Pedidos</title>
<body>

<div class="col-15 p-2">
    <table class="table table-striped table-hover">
        <a name="" id="" class="btn btn-primary" href="pedidos.php" role="button"><i class='bx bx-arrow-back'></i></a>
        <br><br>

        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Valor unitario</th>
                <th>Valor Total</th>
        
                <!-- <th>Valor Unitario</th>
                <th>Valor Total</th> -->
            </tr>
        </thead>       


            <?php           
                $query = "SELECT dp.id AS id_producto, p.Descripción AS dec_prod, p.Marca AS marca, p.Modelo AS modelo, p.Capacidad AS capacidad, p.Dispositivo AS dispositivo, 
                p.precio_publico AS pp, dp.cantidad AS cant
                FROM detalles_pedidos AS dp
                INNER JOIN productos AS p
                ON dp.id_producto=p.id  
                WHERE dp.id_pedido='$id_pedido'";
                $result = $conn->query($query);
            
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                            echo "<td>" . $row["dec_prod"] . " - " . $row["marca"] .  " - " . $row["modelo"] . " - " . $row["capacidad"] . "</td>";
                            echo "<td>" . $row["cant"] . "</td>";
                            echo "<td>" . '$' . number_format($row["pp"], 0, ",", ".") . "</td>";
                            echo "<td>" . '$' . number_format($total_prod= $row["cant"] * $row["pp"]) . "</td>";
                        echo "</tr>";                
                    }
                } else {
                    echo "<tr><td colspan='8'>Aun no se han hecho pedidos.</td></tr>";
                }
            ?>
            
        </tbody>
    </table>
</div>

    <?php
    $query = "SELECT SUM(dp.cantidad * pr.precio_publico) AS total
    FROM detalles_pedidos dp
    JOIN productos pr ON dp.id_producto = pr.id
    WHERE id_pedido= $id_pedido ;";
    $result = $conn->query($query);

    if ($result) {
        $fila = $result->fetch_assoc();
        echo "<p class=\"text-center alert alert-primary\">Valor total por todo: $" . number_format($fila['total'], 0, ".", ",") . "</p>";
    } else {
        echo "Error en la consulta: " . $conn->error;
    }
    
    $conn->close();
?>


<?php
    if ($id_estado_pedido == 3){
        echo '<div class="alert alert-warning text-center container col-sm-3" role="alert">';
            echo "Numero de guia asignado: ";
            echo $Guia . "<br>";
            echo "Fecha despachada el: " . $fecha_despachado;
        echo '</div>';
    } else {
    ?>


<form action="enviar.php" method="POST">
        <div class="text-center">
            <div style="display: none;">
                <input type="number" name="id_pedido" value="<?php echo $id_pedido; ?>">
                <?php
                    date_default_timezone_set("America/Bogota");
                    $fecha_time = date("Y-m-d, H:i:s");
                ?>
                <input type="text" name="fecha_despachado" value="<?php echo $fecha_time; ?>">
                <input type="text" name="correo" value="<?php echo $correo_distri; ?>">
                <input name="subject" value="Pedido Despachado">  <!--Asunto -->
            </div>

            <!----------- bloque para el envío ------------------------>
                <?php
                    if (isset($_POST['send'])) {
                        include("send.php");
                        $mail_username = "pedidosucs@gmail.com"; //Correo electronico saliente ejemplo: tucorreo@gmail.com
                        $mail_userpassword = "ipqy hoyt onde eqrq"; //Tu contraseña de gmail
                        $mail_addAddress = $_POST['correo']; //correo electronico que recibira el mensaje
                        $template = "email_template.html"; //Ruta de la plantilla HTML para enviar nuestro mensaje
                        $mail_setFromEmail = "";
                        $mail_setFromName = $_POST['customer_name'];
                        $txt_message = $_POST['message'];
                        $mail_subject = $_POST['subject']; //Asunto 
                        sendemail($mail_username, $mail_userpassword, $mail_setFromEmail, $mail_setFromName, $mail_addAddress, $txt_message, $mail_subject, $template); //Enviar el mensaje
                    }
                ?>
            <!------------------- Fin del bloque --------------------->

                <input type="text" class="form-control mx-auto col-sm-3 mb-3" name="Guia" placeholder="Digite el numero de guia" required>
                <button type="submit" name="send" class="btn btn-success" onclick = "return confirm('¿Deseas confirmar el despacho del pedido?')">Enviar <i class='bx bxs-send'></i></button>
                
        </div>
    </form>

<?php
    }
?>

    
    

</body>
</html>