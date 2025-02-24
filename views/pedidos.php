<?php
include_once('../includes/header.php');
include_once('../scripts/obtener_pedidos.php');

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
                <th>Nomb. Solicitante</th>
                <th>Ape. Solicitante</th>
                <th>Fecha Pedido</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if (isset($pedidos) && !empty($pedidos)) {
                foreach ($pedidos as $pedido) {
                    echo "<tr>";
                    echo "<td>" . $pedido['id'] . "</td>";
                    echo "<td>" . $pedido['nombre'] . "</td>"; 
                    echo "<td>" . $pedido['apellido'] . "</td>"; 
                    echo "<td>" . $pedido['fecha_pedido'] . "</td>";
                    echo "<td>" . $pedido['estado'] . "</td>";
                    echo "<td>
                        <a href='editar_pedido.php?id_pedido=" . $pedido['id'] . "' class='btn btn-warning btn-sm'>Editar</a>
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