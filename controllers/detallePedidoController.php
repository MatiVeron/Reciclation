<?php 

include_once('../models/detallePedidoModel.php');
include_once('../config/conexion.php');

class DetallePedidoController {

    // Procesar la creación de un nuevo detalle
    public function procesarRegistroDetalle() {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            global $pdo; 
            
            // Obtener los datos del formulario
            $id_pedido = $_POST["id_pedido"];
            $material = $_POST["material"];
            $cantidad = $_POST["cantidad"];
            $tipo = $_POST["tipo"];
            
            // Llamar a la función para guardar el detalle
            $exito = guardarDetallePedido($id_pedido, $material, $cantidad, $tipo, $pdo);
            echo $exito;
        }
    }

    // Procesar la edición de un detalle de pedido
    public function editarDetalle() {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            global $pdo;
            
            $id_detalle = $_POST["id_detalle"];
            $material = $_POST["material"];
            $cantidad = $_POST["cantidad"];
            $tipo = $_POST["tipo"];
            $id_estado = $_POST["id_estado"];
            
            // Llamar a la función para editar el detalle del pedido
            $exito = editarDetallePedido($id_detalle, $material, $cantidad, $tipo,$id_estado, $pdo);
            echo $exito;
        }
    }

    // Procesar la eliminación de un detalle de pedido
    public function eliminarDetalle() {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            global $pdo;
            
            $id_detalle = $_POST["id_detalle"];
            
            // Llamar a la función para eliminar el detalle del pedido
            $exito = eliminarDetallePedido($id_detalle, $pdo);
            echo $exito;
        }
    }

    // Ver los detalles de un pedido
    public function obtenerDetalles($id_pedido) {
        global $pdo;
        
        // Llamar a la función que trae los detalles del pedido
        $detalles = getDetallePedido($id_pedido, $pdo);
        
        if ($detalles) {
            return $detalles; // Devolver los detalles
        } else {
            echo "No se encontraron detalles para este pedido.";
        }
    }

}
?>
