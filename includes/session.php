
<?php
session_start();

// Verifica si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    // Si no estamos en index.php, redirige
    if (basename($_SERVER['PHP_SELF']) != 'login.php') {
        header('Location: ../views/login.php');
        exit;
    }
}
?>


