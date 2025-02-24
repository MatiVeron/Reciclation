<?php
// Iniciar sesión si no ha sido iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//Si no hay un usuario en sesión, redirigir a la página de login
// if (!isset($_SESSION['usuario'])) {
//     header('Location: ../views/login.php');
//     exit;
// }

?>