<?php
include_once("../clases/class-usuario.php");

// echo 'Informacion: '. file_get_contents('php://input');
header("Content-Type: application/json");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $usuario = new Usuario($_POST["correo"], $_POST["contrasena"],);
        $usuario->guardarUsuario();
        $resultado["mensaje"] = "Guardar usuario, información:".json_encode($_POST);
        echo json_encode($resultado);
        break;
    case 'GET':
        if (isset($_GET['id'])) {
            Usuario::obtenerUsuario($_GET['id']);
        } else {
            Usuario::obtenerUsuarios();
        }
        break;
    case 'PUT': 
    
        break;
    case 'DELETE':
        
        break;
}
    // Crear

    // Obtener un usuario

    // Obtener todos los usuarios

    // Actualizar un usuario

    // Eliminar un usuario
