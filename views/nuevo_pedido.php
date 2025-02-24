<?php
include_once('../includes/header.php');
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <!-- Card para centrar el formulario -->
    <div class="card" style="width: 30rem;">
        <div class="card-header">
            <h5 class="card-title text-center">Agregar Detalle a un Nuevo Pedido</h5>
        </div>
        <form method="POST" action="../scripts/procesar_pedido_detalle.php">
            <div class="card-body">
                <!-- Campo oculto para enviar el ID del usuario -->
                <input type="text" name="id_vecino" value="<?php echo $_SESSION['usuario']['id']; ?>" hidden>

                <!-- Detalle del Pedido -->
                <div class="form-group">
                    <label for="material">Material</label>
                    <input type="text" class="form-control" id="material" name="material" placeholder="Ingresa el material" required>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingresa la cantidad" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingresa el tipo" required>
                </div>
            </div>
            <div class="card-footer align-items-end">
                <button type="submit" class="btn btn-success btn-block">Confirmar y Agregar Detalle</button>
            </div>
        </form>
    </div>
</div>

<?php
include_once('../includes/footer.php');
?>
