<?php

include '../conn/conexion.php';

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>


<title>Usuarios Registrados</title>
    <body>
        <div class="col-15">
            <table class="table table-striped table-hover" id="myTable">
                    
                    <?php
                        include "../includes/head.php";
                    ?>
                    
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Correo</th>
                        <th>Empresa</th>
                        <th>Dirección</th>
                        <th>Celular/Telefono</th>
                        <th>Rol</th>
                        <th>Nit</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Nombre"] . "</td>";
            echo "<td>" . $row["Ciudad"] . "</td>";
            echo "<td>" . $row["Correo"] . "</td>";
            echo "<td>" . $row["Empresa"] . "</td>";
            echo "<td>" . $row["Direccion"] . "</td>";
            echo "<td>" . $row["Telefono"] . "</td>";
            echo "<td>" . $row["rol"] . "</td>";
            echo "<td>" . $row["Nit"] . "</td>";
            echo "<td>";
            echo '<a href="editar-usuarios.php?id=' . $row["id"] . '" class="btn btn-small btn-primary"><i class=\'bx bxs-edit-alt\'></i></a>';
            echo "</tr>";

        }
    } else {
        echo "<tr><td colspan='6'>No hay usuarios registrados.</td></tr>";
    }
    ?>
</table>
</div>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

            <script>
                let table = new DataTable('#myTable');
            </script>
    

    </body>
</html>

