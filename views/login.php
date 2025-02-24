<?php 
include_once ('../includes/header.php');
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4 shadow-lg" style="width: 400px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Iniciar Sesión</h3>
            <form action="../scripts/login_ingresar.php" method="post">
                
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>

                <div class="mb-3">
                    <label for="legajo" class="form-label">Legajo (Solo para Admins)</label>
                    <input type="text" class="form-control" id="legajo" name="legajo">
                </div>

                <div class="mb-3">
                    <label for="contrasenia" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include_once ('../includes/footer.php');
?>
