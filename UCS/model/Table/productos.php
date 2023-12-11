<?php

include '../conn/conexion.php';

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

    <title>Productos</title>
<body>

        <div class="col-15">
            <table class="table table-striped table-hover" id="myTable">
                    
                    <?php
                        include "../includes/head.php";
                    ?>
                                
            <div class="text-center">
                <a class="btn btn-small btn-success" href="new_products.php">Registrar producto <i class='bx bxs-add-to-queue'></i></a>
                <br><br>
            </div>

                <thead>
                    <h3 class="text-center alert alert-secondary">Productos registrados</h3>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Tipo Producto</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Características</th>
                        <th>Capacidad</th>
                        <th>Dispositivo</th>
                        <th>Medidas</th>
                        <th>Producto</th>
                        <th>Stock</th>
                        <th>Ubicación</th>
                        <th>Precio Publico</th>
                        <th>Precio Distribuidor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>


                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            // echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["tipo_productos"] . "</td>";
                            echo "<td>" . $row["Descripción"] . "</td>";
                            echo "<td>" . $row["Marca"] . "</td>";
                            echo "<td>" . $row["Modelo"] . "</td>";
                            echo "<td>" . $row["Caracteristicas"] . "</td>";
                            echo "<td>" . $row["Capacidad"] . "</td>";
                            echo "<td>" . $row["Dispositivo"] . "</td>";
                            echo "<td>" . $row["Medidas"] . "</td>";
                            echo "<td>" . $row["Producto"] . "</td>";
                            echo "<td>" . $row["Stock"] . "</td>";
                            echo "<td>";

                            if ($row["id_ubicacion"] == 1) {
                                echo "Comuneros primer piso";
                            } elseif ($row["id_ubicacion"] == 2) {
                                echo "Comuneros segundo piso";

                            } elseif ($row["id_ubicacion"] == 3) {    
                                echo "Las américas";              
                            }

                            echo "</td>";


                            echo "<td style= 'color: green;'>" ."$", number_format($row['precio_publico'],0) . "</td>";
                            echo "<td style= 'color: green;'>" ."$", number_format($row['Precio_distribuidor'],0) . "</td>";

                            echo '<td>';
            
                            ?>
                                <div style="display: flex;">
                                    <a href="editar_producto.php?id=<?php echo $row["id"]; ?>" class="btn btn-small btn-primary"><i class="bx bxs-edit-alt"></i></a>
                                        |
                                    <a href="eliminar_productos.php?id=<?php echo $row["id"]; ?>" class="btn btn-small btn-danger" onclick="return confirm('¿Estás seguro que desea eliminar este producto?');"><i class="bx bxs-trash"></i></a>
                                </div>
                            <?php            
                                
                            echo '</td>';
                            echo "</tr>";    
                            }
                        } else {
                            echo "<tr><td colspan='8'>No hay productos guardados aun.</td></tr>";
                        }
                    ?>

                </tbody>
            </table>
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

            <script>
                let table = new DataTable('#myTable');
            </script>
    </div>

</body>
</html>

