<?php
header("Content-Type: application/json");
include_once("../clases/class-twit.php");
$_POST = json_decode(file_get_contents('php://input'), true);

// echo 'Informacion: '. file_get_contents('php://input');


switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        
        break;
    case 'GET':
        Twit::obtenerTwits();
        break;
    case 'PUT': 
    
        break;
    case 'DELETE':
        
        break;
}