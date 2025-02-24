<?php 

include_once ('../includes/header.php');
?>

<div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
<form action="../scripts/login_ingresar.php" method="post" class="w-50">

    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo">
    </div>
    <div class="mb-3">
        <label for="contraseña" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="contrasenia" name="contrasenia">
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </div>
</form>
</div>

<?php
include_once ('../includes/footer.php');
?>

