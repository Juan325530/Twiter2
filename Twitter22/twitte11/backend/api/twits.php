<?php
session_start(); // Permite acceder a las variables de sesion
header("Content-Type: application/json");
include_once("../clases/class-twit.php");
//$_POST = json_decode(file_get_contents('php://input'), true);

// echo 'Informacion: '. file_get_contents('php://input');


switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $twit = new Twit($_SESSION["twitter_codigousuario"],$_POST["contenidoTwit"],$_POST["imagen"],$_POST["cantidadReTwits"],$_POST["codigoTwitOriginal"]);
        $fin = $twit->guardarTwit();
        echo $fin;
        break;
    case 'GET':
        Twit::obtenerTwits();
        break;
    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'), true);
        Twit::actualizarTwit($_PUT["codigoTwit"], $_PUT["nuevoContenido"]);
        break;
    case 'DELETE':
        $_DELETE = json_decode(file_get_contents('php://input'), true);
        Twit::eliminarTwit($_DELETE["codigoTwit"]);
        break;
}