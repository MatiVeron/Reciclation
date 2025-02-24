<?php 
include_once ('../includes/header.php');
?>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4 shadow-lg" style="width: 30rem;">
            <h3 class="text-center mb-4">Registro de Usuario</h3>
            <form action="../scripts/registrar_usuario.php" method="post">
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>

                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>

                <div class="mb-3">
                    <label for="legajo" class="form-label">Legajo</label>
                    <input type="text" class="form-control" id="legajo" name="legajo" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>

                <div class="mb-3">
                    <label for="contrasenia" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
                </div>

                <div class="mb-3">
                    <label for="repetir-contrasenia" class="form-label">Repetir Contraseña</label>
                    <input type="password" class="form-control" id="repetir-contrasenia" name="repetir-contrasenia" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Registrarme</button>
                </div>

            </form>
        </div>
    </div>
</body>

<?php
include_once ('../includes/footer.php');
?>
