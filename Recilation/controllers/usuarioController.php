

<?php 

include_once('../models/usuarioModel.php');
include_once('../config/conexion.php');

class UsuarioController{

    public function procesarRegistro(){
        
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            global $pdo; 
            $nombre = $_POST["nombre"] ;
            $apellido = $_POST["apellido"] ;
            $correo = $_POST["correo"] ;
            $contrasenia = $_POST["contrasenia"] ;
            $repetir_contrasenia = $_POST["repetir-contrasenia"] ;
            
            if($contrasenia == $repetir_contrasenia){
               
                $exito = registrarUsuario($nombre,$apellido,$contrasenia,$correo,$pdo);
                echo $exito;
                
            }else{
                echo "Las contraseñas no coinciden";
            }
            
            
            
            
            
        }
    }

    public function login(){
        global $pdo; 
      
        $correo = $_POST["correo"] ;
        $contrasenia = $_POST["contrasenia"] ;
   
        $exito = loginUsuario($correo,$contrasenia,$pdo);

        if($exito){

            header('Location:../views/bienvenida.php');
            exit;
        }else{
            echo "usuario o contraseña incorrectos.";
            header('Location:../views/login.php');
            exit;
        }

        
        

    }


}

?>