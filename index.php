<?php

include 'controller/AlunoController.php';
include 'controller/FuncionarioController.php';
include 'controller/ArmarioController.php';
include 'controller/CursoController.php';
include 'controller/AuthenticationController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url) {

    case '/':
        echo "Tela inicial";
    break;

    case '/login':
        AuthenticationController::entrar();
    break;

    case '/sair':
        AuthenticationController::sair();
    break;

    case '/cadastro':
        AlunoController::cadastrar();
    break;

    case '/meu-cadastro':
        AlunoController::selecionar();
    break;
    
    case '/listar-aluno':
        AlunoController::listar();
    break;

    case '/alterar-aluno':
        AlunoController::alterar();
    break;

    case '/excluir-aluno':
        AlunoController::excluir();
    break;

    case '/cadastro-funcionario':
        FuncionarioController::cadastrar();
    break;

    case '/listar-funcionario':
        FuncionarioController::listar();
    break;

    case '/alterar-funcionario':
        FuncionarioController::alterar();
    break;

    case '/excluir-funcionario':
        FuncionarioController::excluir();
    break;

    case '/cadastro-curso':
        CursoController::cadastrar();
    break;

    case '/listar-curso':
        CursoController::listar();
    break;

    case '/alterar-curso':
        CursoController::alterar();
    break;

    case '/excluir-curso':
        CursoController::excluir();
    break;

    case '/cadastro-armario':
        ArmarioController::cadastrar();
    break;

    case '/listar-armario':
        ArmarioController::listar();
    break;

    case '/armarios':
        ArmarioController::listarSelecao();
    break;
    
    case '/alterar-armario':
        ArmarioController::alterar();
    break;


    case '/excluir-armario':
        ArmarioController::excluir();
    break;

    default:
        echo "Erro 404";
    break;
    
}

?>