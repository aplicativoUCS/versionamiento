<?php
$id_pedido=$_GET['id'];
include '../includes/head.php';
// Consulta SQL para obtener los valores únicos de la columna "tipo_productos"
$query = "SELECT DISTINCT tipo_productos FROM productos";
$result = $conn->query($query);
?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

<title>Nuevo pedido</title>

<div class="container">
    <form action="add_product_new.php" method="POST">
            <div class="form-group">

                <label for="id_producto">Productos:</label>
                <select class="form-control" name="id_producto" id="miSelect" required>
                    <option value="">Selecciona un producto</option>

                    <?php
                        $queryTipoProductos = "SELECT * FROM productos where Stock > 0";
                        $resultTipoProductos = $conn->query($queryTipoProductos);

                        while ($row = $resultTipoProductos->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>";

                            $parts = array(
                                ($row['tipo_productos'] !== "N/A") ? $row['tipo_productos'] : "",
                                ($row['Marca'] !== "N/A") ? $row['Marca'] : "",
                                ($row['Capacidad'] !== "N/A") ? $row['Capacidad'] : "",
                                ($row['Dispositivo'] !== "N/A") ? $row['Dispositivo'] : "",
                                ($row['Producto'] !== "N/A") ? $row['Producto'] : "",
                                ($row['precio_publico'] !== "N/A") ? "$" . number_format($row['precio_publico'], 0) : "",
                            );
                            
                            echo implode(" - ", array_filter($parts));

                            if ($row["id_ubicacion"] == 1) {
                                echo " - Ubicación: Comuneros primer piso";
                            } elseif ($row["id_ubicacion"] == 2) {
                                echo " - Ubicación: Comuneros segundo piso";
                            } elseif ($row["id_ubicacion"] == 3) {
                                echo " - Ubicación: Las Américas";
                            }
                            echo "</option>";
                        }
                        ?>

                </select>
                <br>

                <?php
                    $queryid = "SELECT * FROM usuarios WHERE nombre = '" . $_SESSION['usuario'] . "'";;
                    $resultid = $conn->query($queryid);

                    while ($row = $resultid->fetch_assoc()) {
                        $id = $row['id'];
                    }
                ?>                    
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" value="1" placeholder="Seleccione la cantidad" required>
                    
                    <br>

                    <div style="display: none;">
                    <label for="id_distribuidor">Id del Distribuidor</label>
                        <input type="text" class="form-control" name="id_distribuidor" value="<?php echo $id?>">

                        <label for="id_pedido">Id del Pedido:</label>
                        <input type="number" class="form-control" name="id_pedido" id="id_pedido" value="<?php  echo $id_pedido; ?>">       
                        
                        <?php
                        date_default_timezone_set("America/Bogota");
                        $fecha_time = date("Y-m-d, H:i:s"); //forymato con segundos
                    ?>
                    <input type="" name="fecha_prod" value="<?php echo $fecha_time; ?>">

                    </div>
            </div>

            <div class="text-center">
                <button class="btn btn-success" type="submit">Agregar Producto <i class='bx bxs-add-to-queue'></i></button>        
            </div><br>
        
    </form>    

<div class="col-15 p-2">
    <table class="table table-striped table-hover">
        <p class="text-center alert alert-secondary">Tus pedidos</p>

        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Valor Unitario</th>
                <th>Valor Total</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        
        <tbody>
            <?php                
                $query = "SELECT dp.id AS id_producto, p.Descripción AS dec_prod, p.Marca AS marca, p.precio_publico AS pp, dp.cantidad AS cant
                FROM detalles_pedidos AS dp
                INNER JOIN productos AS p
                ON dp.id_producto=p.id
                WHERE dp.id_pedido='$id_pedido'";
                $result = $conn->query($query);
            ?>

            <tr>
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<td>" . $row["dec_prod"] . " - " . $row["marca"] . "</td>";
                            echo "<td>" . $row["cant"] . "</td>";
                            echo "<td>" . '$' . number_format($row["pp"], 0, ",", ".") . "</td>";
                            echo "<td>" . '$' . number_format($total_prod= $row["cant"] * $row["pp"]) . "</td>";
                            echo '<td>';    
                ?>

                <form action='../eliminar/eliminar_new_product.php' method='POST' onclick = "return confirm('¿Estas seguro que quieres eliminar este producto?')">                             
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>"> 
                    <input type="hidden" name="id_pedido" value="<?php echo $id_pedido; ?>">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button> 
                </form>
            </tr>                            

            <?php
                }
                } else {
                    echo "<tr><td colspan='8'>No hay productos guardados aun.</td></tr>";
                }
            ?>
        </tbody>   
        </table>        

        <?php
            $query = "SELECT SUM(dp.cantidad * pr.precio_publico) AS total
            FROM detalles_pedidos dp
            JOIN productos pr ON dp.id_producto = pr.id
            WHERE id_pedido= $id_pedido ;";
            $result = $conn->query($query);            
            // Verificar si la consulta fue exitosa
            if ($result) {
                // Obtener el resultado
                $fila = $result->fetch_assoc();                
                echo "<p class=\"text-center alert alert-primary\">Valor total por todo: $" . number_format($fila['total'], 0, ".", ",") . "</p>";
            } else {
                echo "Error en la consulta: " . $conn->error;
            } 
            $conn->close();
        ?>

<?php
        include '../conn/conexion.php';
        $query = "SELECT dp.id AS id_producto, p.Descripción AS dec_prod, p.Marca AS marca, p.precio_publico AS pp, dp.cantidad AS cant
                    FROM detalles_pedidos AS dp
                    INNER JOIN productos AS p ON dp.id_producto=p.id
                    WHERE dp.id_pedido='$id_pedido'";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Mostrar el formulario solo una vez si hay productos
?>
        <form action="solicitar_pedido.php" method="POST" onclick="return confirm('¿Desea realizar este pedido?')">
            <?php
                date_default_timezone_set("America/Bogota");
                $year = date("Y"); // formato con segundos
            
                $sql3 = $conn->query("SELECT count(id) as ids FROM pedidos WHERE num_pedido !=''");
                while ($row3 = $sql3->fetch_array()) {
                    $total = $row3['ids'];
                }
                $numero_filas_total = $total + 1;
                $num_pedido = $year . '-' . $numero_filas_total;
                date_default_timezone_set("America/Bogota");
                $fecha_time = date("Y-m-d, H:i:s");
                ?>

            <div style="display: none;">
                <input name="id_estado" value="2">
                <input name="id_pedido" value="<?php echo $id_pedido; ?>">
                <input name="num_pedido" value="<?php echo $num_pedido; ?>">
                <input name="fecha_solicitud" value="<?php echo $fecha_time; ?>">
                <input name="customer_name" value="<?php echo $_SESSION['usuario']; ?>">
                <input name="customer_name" value="<?php echo $correo; ?>">
                <input name="message" value="Nuevo pedido">
                <input name="subject" value="Se ha realizado un nuevo pedido">  <!--Asunto -->
            </div>

            <!-- ---------- bloque para el envío ---------------------- -->

            <?php
                if (isset($_POST['send'])) {
                    include("sendemail.php");
                    $mail_username = "pedidosucs@gmail.com"; //Correo electronico saliente ejemplo: tucorreo@gmail.com
                    $mail_userpassword = "ipqy hoyt onde eqrq"; //Tu contraseña de gmail
                    $mail_addAddress = "pedidosucs@gmail.com"; //correo electronico que recibira el mensaje
                    $template = "email_template.html"; //Ruta de la plantilla HTML para enviar nuestro mensaje
                    $mail_setFromEmail = "";
                    $mail_setFromName = $_POST['customer_name'];
                    $txt_message = $_POST['message'];
                    $mail_subject = $_POST['subject']; // Asunto
                    sendemail($mail_username, $mail_userpassword, $mail_setFromEmail, $mail_setFromName, $mail_addAddress, $txt_message, $mail_subject, $template); //Enviar el mensaje
                }
            ?>
            <!-- ------------------ Fin del bloque ----------------------- -->

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-sm">Solicitar Pedido <i class='bx bxs-cart'></i></button>
        </div>
        
    </form>
    <?php
}
?>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#miSelect').select2();
    });
</script>

