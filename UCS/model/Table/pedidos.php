<?php
session_start();
$nombreUsuario = $_SESSION['usuario'];
include("../conn/conexion.php");
include("../includes/head.php");

$sql = "SELECT u.Nombre AS name, u.Empresa AS emp, p.id AS id_pedido, p.id_estado AS estado, p.fecha_solicitud AS fs, p.fecha_borrador AS fsb, 
        p.fecha_despachado AS fsp, p.Guia AS guia 
        FROM `pedidos` AS p 
        INNER JOIN usuarios AS u 
        ON p.id_cliente=u.id
        WHERE id_estado IN ('2','3')";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Pedidos de Distribuidores</title>
</head>

<body>

    <div class="col-15 p-4">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Usuarios</th>
                        <th>Estado pedido</th>
                        <th>Empresa</th>
                        <th>Fecha de solicitud</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        if ($row["estado"] == 1) {
                            echo "<td>Borrador</td>";
                        } elseif ($row["estado"] == 2) {
                            echo "<td style='background-color: #ffc107; color: #fff; text-align: center; width: 10px; font-weight: 400;'>Solicitado</td>";
                        } elseif ($row["estado"] == 3) {
                            echo "<td style='background-color: #28a745; color: #fff; text-align: center; width: 10px; font-weight: 400;'>Despachado</td>";
                        }

                        echo "<td>" . $row["emp"] . "</td>";
                        echo "<td>" . $row["fsb"] . "</td>";
                        echo '<td>';
                            echo '<a href="ver_pedidos.php?id=' . $row["id_pedido"] . '&estado=' . $row["estado"] . '&guia=' . $row["guia"] . '&fsp=' . $row["fsp"] . '" class="btn btn-small btn-primary">Ver <i class=\'bx bxs-show\'></i></a>';
                        echo '</td>';
                        echo "</tr>";

                    }
                } else {
                    echo "<tr><td colspan='6'>Aun no hay pedidos.</td></tr>";
                }
                ?>
            </table>

            </tbody>
            </table>
        </body>

</html>