<?php

if (!empty($_POST["btn"])) {
    if (!empty($_POST["tipo_productos"]) and !empty($_POST["Descripción"]) and !empty($_POST["Marca"]) and !empty($_POST["Modelo"]) and !empty($_POST["Caracteristicas"]) and !empty($_POST["Capacidad"])  and !empty($_POST["Dispositivo"]) and !empty($_POST["Medidas"]) and !empty($_POST["Precio"])) {

        $tipo_productos = $_POST["tipo_productos"];
        $Descripción = $_POST["Descripción"];
        $Marca = $_POST["Marca"];
        $Modelo = $_POST["Modelo"];
        $Caracteristicas = $_POST["Caracteristicas"];
        $Capacidad = $_POST["Capacidad"];
        $Dispositivo = $_POST["Dispositivo"];
        $Medidas = $_POST["Medidas"];
        $Precio = $_POST["Precio"];

        $sql = $conexion->query("INSERT INTO productos (tipo_productos, Descripción, Marca, Modelo, Caracteristicas, Capacidad, Dispositivo, Medidas, Precio)
        VALUES ('$tipo_productos', '$Descripción', '$Marca', '$Modelo', '$Caracteristicas', '$Capacidad', '$Dispositivo', '$Medidas', '$Precio')");

        if ($sql==1) {
            echo '<div class="alert alert-success">Producto Registrado</div>';
        } else {
            echo '<div class="alert alert-danger">Hubo un error al registrar el producto</div>';
        }


    } else {
        echo '<div class="alert alert-warning">Complete los campos vacíos</div>';
    }
}
?>
