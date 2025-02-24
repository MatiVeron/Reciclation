<?php

include_once('../includes/header.php');
include_once('../scripts/obtener_pedido_id.php');

?>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <!-- Card para centrar el formulario -->
    <div class="card" style="width: 30rem;">
        <div class="card-header">
            <h5 class="card-title text-center">Editar Pedido</h5>
        </div>
        <form method="POST" action="../scripts/procesar_editar_pedido.php">
            <div class="card-body">
                <!-- Campo oculto para enviar el ID del pedido -->
                <input type="hidden" name="id_pedido" value="<?php echo $pedido['id']; ?>" />

                <div class="form-group">
                    <label for="material">Material</label>
                    <input type="text" class="form-control" id="material" name="material" value="<?php echo $pedido['material']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $pedido['cantidad']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $pedido['tipo']; ?>" required>
                </div>

                <!-- Solo el admin o usuarios con rol adecuado pueden cambiar el estado -->
                <?php if ($rol === 'admin' || $rol === 'super_admin'): ?>
                    <div class="form-group mt-3">
                        <label for="estado">Estado del Pedido</label>
                        <select class="form-control" id="estado" name="estado">
                            <option value="1" <?php echo $pedido['id_estado'] == 1 ? 'selected' : ''; ?>>Pendiente</option>
                            <option value="2" <?php echo $pedido['id_estado'] == 2 ? 'selected' : ''; ?>>En Proceso</option>
                            <option value="3" <?php echo $pedido['id_estado'] == 3 ? 'selected' : ''; ?>>Finalizado</option>
                        </select>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-block">Actualizar Pedido</button>
            </div>
        </form>
    </div>
</div>

<?php
include_once('../includes/footer.php');
?>