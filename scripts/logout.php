<?php
// Iniciar la sesión
session_start();

// Destruir la sesión
session_unset();  // Elimina todas las variables de sesión
session_destroy();  // Destruye la sesión

// Redirigir al usuario a la página de inicio de sesión
header('Location: ../views/login.php');
exit;
?>
