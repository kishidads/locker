<?php

//include 'Controller/AlunoController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/':
        echo "Tela inicial";
    break;

    case '/login':
        include 'view/aluno/login.php';
    break;
        
    case '/cadastro':
        include 'view/aluno/cadastro.php';
    break;

    case '/armarios':
        include 'view/armarios.php';;
    break;

    case '/meu-cadastro':
        include 'view/aluno/meu-cadastro.php';;
    break;

    default:
        echo "Erro 404";
    break;
}

?>