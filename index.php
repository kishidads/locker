<?php

include 'Controller/AlunoController.php';
include 'Controller/AuthenticationController.php';
include 'Controller/ArmarioController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url) {

    case '/':
        echo "Tela inicial";
    break;

    case '/login':
        AuthenticationController::authentication();
    break;

    case '/cadastro':
        AlunoController::cadastrar();
    break;

    case '/meu-cadastro':
        AlunoController::alterar();
    break;

    case '/cadastro-armarios':
        ArmarioController::cadastrar();
    break;

    case '/armarios':
        ArmarioController::listar();
    break;

    default:
        echo "Erro 404";
    break;
    
}

?>