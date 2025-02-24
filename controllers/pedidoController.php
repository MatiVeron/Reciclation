<?php

include_once('../models/pedidoModel.php');
include_once('../config/conexion.php');

class PedidoController
{

    // Procesar la creación de un nuevo pedido
    public function procesarNuevoPedido()
    {

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            global $pdo;

    
            $id_vecino = $_POST["id_vecino"];

            // Obtener los datos del formulario
            $material = $_POST["material"];
            $cantidad = $_POST["cantidad"];
            $tipo = $_POST["tipo"];

            // Asignación automática de valores para el pedido
            $id_estado = 1;  // Ejemplo: Pendiente

            // Llamar al modelo para guardar el pedido y obtener el ID del pedido
            $id_pedido = guardarPedido($id_estado, $id_vecino, $pdo);

            if ($id_pedido) {
                // Llamar al modelo para guardar el detalle del pedido
                $exito = guardarDetallePedido($id_pedido, $material, $cantidad, $tipo, $pdo);

                if ($exito) {
                    header('Location: ../views/pedidos.php');  // Redirigir al listado de pedidos
                    exit;
                } else {
                    echo "Error al guardar los detalles del pedido.";
                }
            } else {
                echo "Error al crear el pedido.";
            }
        }
    }

    // Procesar el cambio de estado de un pedido
    public function cambiarEstado()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            global $pdo;

            $id_pedido = $_POST["id_pedido"];
            $id_estado = $_POST["id_estado"]; // El nuevo estado del pedido

            // Llamar a la función para cambiar el estado del pedido
            $exito = cambiarEstadoPedido($id_pedido, $id_estado, $pdo);
            echo $exito;
        }
    }

    public function obtenerPedidos()
    {
        global $pdo;
        // Llamar al modelo para obtener todos los pedidos
        $pedidos = getPedidos($pdo);  // Esto obtiene todos los pedidos desde el modelo

        if ($pedidos) {
            return $pedidos;
        } else {
            return [];
        }
    }


    public function obtenerPedidoPorId($id_pedido)
    {
        global $pdo;
        // Llamar al modelo para obtener un pedido por ID
        $pedido = getPedidoById($id_pedido, $pdo);  // Esto obtiene un pedido por ID desde el modelo

        if ($pedido) {
            return $pedido;
        } else {
            return null;
        }
    }


    public function procesarEdicionPedido() {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            global $pdo;

            $id_pedido = $_POST["id_pedido"];
            $material = $_POST["material"];
            $cantidad = $_POST["cantidad"];
            $tipo = $_POST["tipo"];
            $id_estado = $_POST["estado"];

            // Llamar al modelo para actualizar el pedido
            $exito = actualizarPedido($id_pedido, $material, $cantidad, $tipo, $id_estado, $pdo);

            if ($exito) {
                header('Location: ../views/pedidos.php');  // Redirigir al listado de pedidos
                exit;
            } else {
                echo "Error al actualizar el pedido.";
            }
        }
        
    }
}
