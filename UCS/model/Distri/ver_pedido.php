<?php

$id_pedido=$_GET['id'];
$Guia=$_GET['guia'];


include '../includes/head.php';

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}


// Consulta SQL para obtener los valores únicos de la columna "tipo_productos"
$query = "SELECT DISTINCT tipo_productos FROM productos";
$result = $conn->query($query);
?>

<title>Ver mis pedidos</title>

    
<div class="container">

<div class="col-15 p-2">
    <table class="table table-striped table-hover">
        <p class="text-center alert alert-secondary">Esto es lo que pediste</p>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Marca</th>
                <th>Valor Unitario</th>
                <th>Valor Total</th>
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
                            echo "<td>" . $row["marca"] . "</td>";
                            echo "<td>" . '$' . number_format($row["pp"], 0, ",", ".") . "</td>";
                            echo "<td>" . '$' . number_format($total_prod= $row["cant"] * $row["pp"]) . "</td>";
                ?>           

            </tr>

            <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay productos agregadoss aún.</td></tr>";
                }
            ?>
        </tbody>
    </table>

            <?php
                date_default_timezone_set("America/Bogota");
                $year = date("Y"); //formato con segundos

                $sql3 = $conn->query("SELECT count(id) as ids FROM pedidos WHERE num_pedido !=''");
                while ($row3 = $sql3->fetch_array()) {
                $total = $row3['ids'];
                }
                $numero_filas_total = $total + 1;
                $num_pedido = $year. '-' . $numero_filas_total;
                date_default_timezone_set("America/Bogota");
                $fecha_time = date("Y-m-d, H:i:s");
            ?>

            <input type="hidden" name="id_estado" value="2">
            <input type="hidden" name="id_pedido" value="<?php echo $id_pedido; ?>">
            <input type="hidden" name="num_pedido" value="<?php echo $num_pedido; ?>">

    </form>   

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
    echo '<div class="alert alert-warning text-center" role="alert">';
        echo "Su numero de guía es: ";
        echo $Guia;
    echo '</div>';
    
?>

</div>  