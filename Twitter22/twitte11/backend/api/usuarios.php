<?php
session_start(); // Permite acceder a las variables de sesion
include_once("../clases/class-usuario.php");

header("Content-Type: application/json");

switch ($_SERVER['REQUEST_METHOD']) {  
    case 'POST': //insertar un usuario
        $_POST = json_decode(file_get_contents('php://input'), true);
        $usuario = new Usuario($_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["fechaNacimiento"], $_POST["contrasena"]);
        $fin = $usuario->guardarUsuario(); 
        if ($fin["resultado"] != 0) { // El usuario se registro, datos validos
            // Variables de sesion
            $_SESSION["twitter_codigousuario"] = $fin["codigoUsuario"];
            $_SESSION["twitter_nombre"] = $_POST["nombre"];
            $_SESSION["twitter_apellido"] = $_POST["apellido"];
            $_SESSION["twitter_correo"] = $_POST["correo"];
            echo $fin["resultado"];
        }
        else { // Usuario no registrado, el correo que desea usar ya existe
            echo $fin["resultado"];
        }
        break;
    case 'GET':
        if (isset($_GET['id'])) {
            Usuario::obtenerUsuario($_GET['id']);
        }
        else if ( isset($_GET["correo"]) || isset($_GET["contrasena"]) )  {
            $fin = Usuario::validarInicioSesion($_GET['correo'], $_GET["contrasena"]); //llamo al metodo validarInicioSesion
            if ($fin["resultado"] != 0) { // Credenciales correctas
                // Variables de sesion
                $_SESSION["twitter_codigousuario"] = $fin["codigoUsuario"];
                $_SESSION["twitter_nombre"] = $fin["nombre"];
                $_SESSION["twitter_apellido"] = $fin["apellido"];
                $_SESSION["twitter_correo"] = $_GET["correo"];
                echo $fin["resultado"];
            } else { // Credenciales incorrectas
                echo $fin["resultado"];
            }
        }
        else {
            Usuario::obtenerUsuarios();
        }
        break;
    case 'PUT': 
        $_PUT = json_decode(file_get_contents('php://input'), true);
        Usuario::editarUsuario($_SESSION["twitter_codigousuario"],$_PUT["nombre"],$_PUT["apellido"],$_PUT["contrasena"]);
        break;
    case 'DELETE':
        
        break;
}
    
    //CRUD 
    // Crear

    // Obtener un usuario

    // Obtener todos los usuarios

    // Actualizar un usuario

    // Eliminar un usuario
