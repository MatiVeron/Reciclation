<?php

include_once('../config/conexion.php');



function guardarPedido($id_estado,$id_vecino,$pdo){

    $fecha_actual = date('Y-m-d'); 
    $query = "INSERT INTO pedidos (id_estado,id_vecino,fecha_pedido) VALUES (?,?,?)";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_estado,$id_vecino,$fecha_actual]);

    if($stmt){
        return $pdo->lastInsertId();
     
    }else{
        echo "Algo Fallo";
    }
}

function getPedidosByUsuario($id_vecino, $pdo){
    $query = "SELECT * FROM pedidos 
                LEFT JOIN pedidos_detalle ON pedidos_detalle.id_pedido = pedidos.id
                WHERE id_vecino = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_vecino]);

    if($stmt->rowCount() > 0) {
        // Devuelves todos los pedidos del usuario
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "No se encontraron pedidos para este usuario";
        return [];
    }
}

// En tu modelo pedidoModel.php
function getPedidos($pdo) {
    $query = "SELECT pedidos.* , pedidos_estado.estado FROM pedidos 
            LEFT JOIN pedidos_estado ON pedidos_estado.id = pedidos.id_estado"; // Aquí puedes agregar un JOIN si quieres obtener información relacionada como el estado o el vecino
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Devuelve todos los pedidos
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Usamos FETCH_ASSOC para obtener los resultados como un array asociativo
}



function getDetallePedido($id_pedido, $pdo){
    $query = "SELECT * FROM pedidos_detalle WHERE id_pedido = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_pedido]);

    if($stmt->rowCount() > 0) {
        // Devuelves el detalle del pedido
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "No se encontró el detalle para este pedido";
        return null;
    }
}


function guardarDetallePedido($id_pedido, $material, $cantidad, $tipo, $pdo){
    // Corregir la declaración de la variable $query
    $query = "INSERT INTO pedidos_detalle (id_pedido, material, cantidad, tipo) VALUES (?,?,?,?)";    
    
    $stmt = $pdo->prepare($query);
    $resultado = $stmt->execute([$id_pedido, $material, $cantidad, $tipo]);
   
    // Verificar si la inserción fue exitosa
    if ($resultado) {
        return true; // Éxito
    } else {
        return false; // Error
    }
}


function eliminarDetallePedido($id_detalle, $pdo) {
    $query = "DELETE FROM pedidos_detalle WHERE id_detalle = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_detalle]);

    if ($stmt) {
        header('Location:../views/pedidos.php');
        exit;
    } else {
        echo "No se pudo eliminar el detalle del pedido.";
    }
}


function editarDetallePedido($id_detalle, $material, $cantidad, $tipo, $pdo) {
    $query = "UPDATE pedidos_detalle 
              SET material = ?, cantidad = ?, tipo = ? 
              WHERE id_detalle = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$material, $cantidad, $tipo, $id_detalle]);

    if ($stmt) {
        header('Location:../views/pedidos.php');
        exit;
    } else {
        echo "No se pudo actualizar el detalle del pedido.";
    }
}


function cambiarEstadoPedido($id_pedido, $id_estado, $pdo) {
    $query = "UPDATE pedidos 
              SET id_estado = ? 
              WHERE id_pedido = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_estado, $id_pedido]);

    if ($stmt) {
        header('Location:../views/pedidos.php');
        exit;
    } else {
        echo "No se pudo cambiar el estado del pedido.";
    }
}





?>