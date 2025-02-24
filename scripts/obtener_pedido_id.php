<?php
include_once('../includes/header.php'); 
include_once('../controllers/pedidoController.php');

// Asumimos que el ID del pedido se pasa por URL
$id_pedido = $_GET['id_pedido']; 

$pedidoController = new PedidoController();
$pedido = $pedidoController->obtenerPedidoPorId($id_pedido);  // Método que obtiene el pedido por ID

// Si no existe el pedido, redirigimos
if (!$pedido) {
    header('Location: ../views/pedidos.php');
    exit;
}

// Comprobamos el rol del usuario desde la sesión
$rol = $_SESSION['usuario']['rol'];  // Asumiendo que 'rol' está en la sesión (vecino, admin, etc.)
?>