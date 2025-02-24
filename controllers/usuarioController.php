

<?php 

include_once('../models/usuarioModel.php');
include_once('../config/conexion.php');

session_start();

class UsuarioController{

    public function procesarRegistro(){
        
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            global $pdo; 
            $nombre = $_POST["nombre"] ;
            $apellido = $_POST["apellido"] ;
            $dni = $_POST["dni"] ;
            $legajo = $_POST["legajo"] ;
            $correo = $_POST["correo"] ;
            $contrasenia = $_POST["contrasenia"] ;
            $repetir_contrasenia = $_POST["repetir-contrasenia"] ;
            
            if($contrasenia == $repetir_contrasenia){
               
                $exito = registrarUsuario($nombre, $apellido, $dni, $legajo, $correo, $contrasenia, $pdo);
                echo $exito;
                
            }else{
                echo "Las contraseñas no coinciden";
            }
            
        
            
            
        }
    }
    public function login() {
        global $pdo; 
    
        $dni = $_POST["dni"];
        $legajo = $_POST["legajo"] ?? ''; // Si no se proporciona, se asume vacío
        $contrasenia = $_POST["contrasenia"];
    
        // Llamamos a la función loginUsuario que debería retornar un usuario o false
        $usuario = loginUsuario($dni, $legajo, $contrasenia, $pdo);
    
        if ($usuario) {
            // Iniciar sesión si no está iniciada
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        // calcular el rol en base si tiene legajo o no
            $_SESSION['usuario'] = $usuario ;
            
    
            // Redirigir según el rol del usuario
            if ($usuario['rol'] === 'admin') {
                header('Location: ../views/pedidos.php');
            } else {
                header('Location: ../views/bienvenida.php');
            }
            exit;
        } else {
            echo "Usuario o contraseña incorrectos.";
            header('Location: ../views/login.php');
            exit;
        }
    }
    
    


}

?>