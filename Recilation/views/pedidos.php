<?php
include_once('../includes/header.php');
include_once('../controllers/pedidoController.php');

// Crear una instancia del controlador
$pedidoController = new PedidoController();

// Llamar al método que obtiene los pedidos
$pedidoController->obtenerPedidos()

?>

<div class="container mt-5">
    <h2>Lista de Pedidos</h2>
    <hr>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="nuevo_pedido.php">New Ped</a>
        </div>
    </div>
    <hr>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID Pedido</th>
                <th>Estado</th>
                <th>Vecino</th>
                <th>Fecha Pedido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
         
            if (isset($pedidos) && !empty($pedidos)) {
                foreach ($pedidos as $pedido) {
                    echo "<tr>";
                    echo "<td>" . $pedido['id'] . "</td>";
                    echo "<td>" . $pedido['id_estado'] . "</td>";  // Aquí puedes convertir el id_estado en el nombre del estado si tienes una tabla con los estados
                    echo "<td>" . $pedido['id_vecino'] . "</td>"; // Aquí también puedes mostrar el nombre del vecino si lo deseas
                    echo "<td>" . $pedido['fecha_pedido'] . "</td>";
                    echo "<td>
                        <a href='editarPedido.php?id_pedido=" . $pedido['id'] . "' class='btn btn-warning btn-sm'>Editar</a>
                        <a href='eliminarPedido.php?id_pedido=" . $pedido['id'] . "' class='btn btn-danger btn-sm'>Eliminar</a>
                        <a href='verDetalle.php?id_pedido=" . $pedido['id'] . "' class='btn btn-info btn-sm'>Ver Detalle</a>
                      </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay pedidos registrados.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include_once('../includes/footer.php');
?>