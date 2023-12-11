<?php
include '../includes/head.php';
$queryid = "SELECT id FROM usuarios WHERE nombre = '" . $_SESSION['usuario'] . "'";
$resultid = $conn->query($queryid);
while ($row = $resultid->fetch_assoc()) {
    $id = $row['id'];
}
?>

<title>Bienvenido</title>

<div class="container">

    <div class="text-center">
        <form action="insert_new_pedido.php" method="POST">
            <?php
            date_default_timezone_set("America/Bogota");
            $fecha_time = date("Y-m-d, H:i:s"); //formato con segundos
            ?>

            <input type="hidden" name="fecha_borrador" value="<?php echo $fecha_time; ?>">
            <input type="hidden" name="id_cliente" value="<?php echo $id ?>">
            <input type="hidden" name="id_estado" value="1">

            <button type="submit" class="btn btn-success" name="submit">Hacer un Pedido Nuevo <i class='bx bxs-cart-add' ></i></button>
        </form>

    </div>
    <br>
    <table class="table table-striped table-hover">
        <p class="text-center alert alert-primary">Tus pedidos</p>
        <thead>
            <tr>
                <th>Estado</th>
                <th>Fecha de Creación</th>
                <th>Fecha de Solicitud</th>
                <th>Fecha de Despacho</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <?php

        if ($conn->connect_error) {
            die("La conexión a la base de datos falló: " . $conn->connect_error);
        }

        $query = "SELECT p.id AS borrador, p.Guia AS guia, p.id_estado AS estado, p.fecha_borrador AS fecha_borrador, p.fecha_solicitud AS fecha_solicitud, p.fecha_despachado AS fecha_despachado FROM pedidos AS p INNER JOIN usuarios AS u
            ON p.id_cliente = u.id WHERE id_cliente='$id' order by p.id_estado asc";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id_pedido = $row['borrador'];
                $Guia = $row["guia"];
                echo "<tr>";
                if ($row["estado"] == 1) {
                    echo "<td style='background-color: #dc3545; color: #fff; text-align: center; font-weight: 400;'>Borrador</td>";
                } elseif ($row["estado"] == 2) {
                    echo "<td style='background-color: #ffc107; color: #fff; text-align: center; font-weight: 400;'>Solicitado</td>";
                } elseif ($row["estado"] == 3) {
                    echo "<td style='background-color: #28a745; color: #fff; text-align: center; font-weight: 400;'>Despachado</td>";
                } elseif ($row["estado"] == 4) {
                    echo "<td>Cancelado</td>";
                }
                echo "<td>" . $row["fecha_borrador"] . "</td>";
                echo "<td>" . $row["fecha_solicitud"] . "</td>";
                echo "<td>" . $row["fecha_despachado"] . "</td>";
                echo '<td>';

                if ($row['estado'] == 1) {
                    ?>
        <a href="editar_pedido.php?id=<?php echo $id_pedido; ?>" title="Editar mi pedido"
            class="btn btn-small btn-primary"><i class="bx bxs-edit-alt"></i></a>

        <a href="../eliminar/eliminar.php?id=<?php echo $id_pedido; ?>" title="Eliminar mi pedido"
            class="btn btn-small btn-danger" onclick="return confirm('¿Estás seguro que desea eliminar este pedido?');">
            <i class="bx bxs-trash"></i></a>
            
        <?php
        }elseif ($row['estado'] == 3) {
            ?>

        <a href="ver_pedido.php?id=<?php echo $id_pedido . '&guia=' . $Guia ; ?>" title="Ver mi pedido" class="btn btn-small btn-warning">
                    <i class="bx bx-notepad"></i></a>

        <a href="../eliminar/eliminar.php?id=<?php echo $id_pedido; ?>" title="Eliminar mi pedido"
            class="btn btn-small btn-danger" onclick="return confirm('¿Estás seguro que desea eliminar este pedido?');">
            <i class="bx bxs-trash"></i></a>

        <?php
            } else {
                    ?>
        <a href="ver_pedido.php?id=<?php echo $id_pedido; ?>" title="Ver mi pedido" class="btn btn-small btn-warning">
            <i class="bx bx-notepad"></i></a>
        <?php
                }
                echo '</td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No hay productos guardados aun.</td></tr>";
        }
        ?>

        </tbody>
    </table>

</div>