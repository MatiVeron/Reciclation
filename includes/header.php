<?php 
include_once('../includes/session.php');  // Asegura que la sesión esté iniciada
// Verificamos si no hay sesión activa


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <!-- Aquí va tu contenido del header o navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mi Aplicación</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="bienvenida.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pedidos.php">Pedidos</a>
                    </li>
                    <?php if(isset($_SESSION['usuario'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../scripts/logout.php">Cerrar sesión</a>
                    </li>
                    <?php endif; ?>

                    <!-- nombre del usuario -->
                    <?php if(isset($_SESSION['usuario'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bienvenido <?php echo $_SESSION['usuario']['nombre']; ?> </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fin del contenido del header -->
