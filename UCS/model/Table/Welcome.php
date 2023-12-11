<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $nombreUsuario = $_SESSION['usuario'];
}
include '../includes/head.php';
?>