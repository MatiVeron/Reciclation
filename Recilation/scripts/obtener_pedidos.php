<?php

include_once('../controllers/pedidoController.php');

$pedidoController = new PedidoController();
$pedidoController->obtenerPedidos();

?>