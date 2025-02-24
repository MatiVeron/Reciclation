<?php

include_once('../config/conexion.php');

function usuarioExiste($dni, $legajo, $pdo)
{
    $query = "SELECT COUNT(*) FROM usuarios WHERE dni = ? OR legajo = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$dni, $legajo]);

    if ($stmt->fetchColumn() > 0) {
        return true;
    } else {
        return false;
    }
}


function guardarUsuario($nombre, $apellido, $dni, $legajo, $contrasenia, $correo, $pdo) {
    // Hash de la contraseña antes de guardarla
    $contraseniaHash = password_hash($contrasenia, PASSWORD_BCRYPT);

    // Determinar el rol del usuario
    $rol = (!empty($legajo)) ? 'admin' : 'usuario_vecino';

    // Consulta SQL para insertar los datos
    $query = "INSERT INTO usuarios (nombre, apellido, dni, legajo, contrasenia, email) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($query);
    $exito = $stmt->execute([$nombre, $apellido, $dni, $legajo, $contraseniaHash, $correo]);

    if ($exito) {
        header('Location: ../views/login.php');
        exit;
    } else {
        echo "Algo falló al registrar el usuario.";
    }
}


function registrarUsuario($nombre, $apellido, $dni, $legajo, $correo, $contrasenia, $pdo)
{
    if (usuarioExiste($dni, $legajo, $pdo)) {
        return "ya existe un usuario con ese dni o legajo";
    }

    if (guardarUsuario($nombre, $apellido,$dni, $legajo, $contrasenia, $correo, $pdo)) {
        return "Usuario Registrado";
    } else {
        return "Error al registrar el usuario";
    }
}

// function loginUsuario($correo,$contrasenia,$pdo){
//     $query = 'SELECT COUNT(*) FROM usuarios WHERE email = ? AND contrasenia  = ?';

//     $stmt = $pdo->prepare($query);
//     $stmt->execute([$correo,$contrasenia]);

//     if($stmt->fetchColumn() > 0){
//         return true;
//     }else{
//         return false;
//     }

// }


function loginUsuario($dni, $legajo, $contrasenia, $pdo) {
    // Determinar el tipo de usuario según si proporciona legajo o no
    if (!empty($legajo)) {
        // Admin nivel 1 (se requiere DNI + Legajo + Contraseña)
        $query = "SELECT id, nombre, email, contrasenia, 'admin' AS rol FROM usuarios WHERE dni = :dni AND legajo = :legajo";
    } else {
        // Usuario vecino (se requiere solo DNI + Contraseña)
        $query = "SELECT id, nombre, email, contrasenia, 'usuario_vecino' AS rol FROM usuarios WHERE dni = :dni";
    }

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);

    if (!empty($legajo)) {
        $stmt->bindParam(':legajo', $legajo, PDO::PARAM_STR);
    }

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si la contraseña ingresada coincide con la almacenada en la BD
        if (password_verify($contrasenia, $usuario['contrasenia'])) {
            // Agregar el rol (admin o usuario_vecino)
            $usuario['rol'] = !empty($legajo) ? 'admin' : 'usuario_vecino';
            return $usuario;
        }
    }

    return false; // Si no hay coincidencias
}

