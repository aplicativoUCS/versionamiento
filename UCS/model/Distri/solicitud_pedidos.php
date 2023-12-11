<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $nombreUsuario = $_SESSION['usuario'];
    echo '<p class="text-center alert alert-primary">Bienvenido(a), señor(a) ' . $nombreUsuario . '</p>';
} else {    
    echo '<p>Por favor, inicie sesión para ver esta página.</p>';
}
include'../conn/conexion.php';
$queryid = "SELECT * FROM usuarios WHERE nombre = '" . $_SESSION['usuario'] . "'";
            $resultid = $conn->query($queryid);
            while ($row = $resultid->fetch_assoc()) {
                $id = $row['id'];
            }

$sql = "SELECT id FROM pedidos WHERE id_cliente=$id
        ORDER BY id DESC
        LIMIT 1";
$resultado = $conn->query($sql);
while ($row = $resultado->fetch_assoc()) {
    $id_new_pedido = $row['id'];
}

echo $id_new_pedido;

?>

