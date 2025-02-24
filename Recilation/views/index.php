
<?php 

include_once ('../includes/header.php');?>
<body>

    <div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form action="../scripts/registrar_usuario.php" method="post" class="w-50">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo">
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasenia" name="contrasenia">
            </div>
            <div class="mb-3">
                <label for="repetir-contraseña" class="form-label">Repetir contraseña</label>
                <input type="password" class="form-control" id="repetir-contrasenia" name="repetir-contrasenia">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Registrarme</button>
            </div>
        </form>
    </div>




</body>
<?php
include_once ('../includes/footer.php');
?>

