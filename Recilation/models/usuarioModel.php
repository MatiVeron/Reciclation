<?php

include_once('../config/conexion.php');

function usuarioExiste($nombre,$correo,$pdo){

    $query = 'SELECT COUNT(*) FROM usuarios WHERE nombre = ? AND email = ?';

    $stm = $pdo->prepare($query);
    $stm->execute([$nombre,$correo]);

    return $stm->fetchColumn() > 0;


}


function guardarUsuario($nombre,$apellido,$contrasenia,$correo,$pdo){

    $query = "INSERT INTO usuarios (nombre,apellido,contrasenia,email) VALUES (?,?,?,?)";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$nombre,$apellido,$contrasenia,$correo]);

    if($stmt){
        header('Location:../views/login.php');
        exit;
        
    }else{
        echo "Algo Fallo";
    }
}

function registrarUsuario($nombre,$apellido,$contrasenia,$correo,$pdo){
    if(usuarioExiste($nombre,$correo,$pdo)){
        return "correo registrado";
    }

    if(guardarUsuario($nombre,$apellido,$contrasenia,$correo,$pdo)){
        return "Usuario Registrado";
    }else{
        return "Error al registrar el usuario"; 
    }
}

function loginUsuario($correo,$contrasenia,$pdo){
    $query = 'SELECT COUNT(*) FROM usuarios WHERE email = ? AND contrasenia  = ?';

    $stmt = $pdo->prepare($query);
    $stmt->execute([$correo,$contrasenia]);
    
    if($stmt->fetchColumn() > 0){
        return true;
    }else{
        return false;
    }

}



?>