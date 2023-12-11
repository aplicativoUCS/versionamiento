<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $database = "ucs";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    $id_distribuidor =  $_POST['id_distribuidor'];
    $id_producto =      $_POST['id_producto']; 
    $cantidad =         $_POST['cantidad'];    
    $estado =           "1";
    

    $sql = "INSERT INTO pedidos (id_cliente, id_producto, cantidad, estado) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    // $stmt->bind_param("iss" ,$id_distribuidor, $id_producto, $cantidad, $estado);
    $stmt->bind_param("iiss", $id_distribuidor, $id_producto, $cantidad, $estado);


    if ($stmt->execute()) {
        header("Location: distribuidores.php");
    } else {
        echo "Error al guardar el pedido: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>