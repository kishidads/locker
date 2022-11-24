<?php

include 'controller/AlunoController.php';
include 'controller/FuncionarioController.php';
include 'controller/ArmarioController.php';
include 'controller/CursoController.php';
include 'controller/AluguelController.php';
include 'controller/AuthenticationController.php';
include 'controller/AdmAuthenticationController.php';

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
    
    case '/adm/dashboard/listar-aluno':
        AlunoController::listar();
    break;

    case '/adm/dashboard/alterar-aluno':
        AlunoController::alterar();
    break;

    case '/adm/dashboard/excluir-aluno':
        AlunoController::excluir();
    break;

    case '/adm/login':
        AdmAuthenticationController::entrar();
    break;

    case '/adm/sair':
        AdmAuthenticationController::sair();
    break;

    case '/adm/dashboard/overview':
        FuncionarioController::dashboard();
    break;

    case '/adm/dashboard/cadastro-funcionario':
        FuncionarioController::cadastrar();
    break;

    case '/adm/dashboard/listar-funcionario':
        FuncionarioController::listar();
    break;

    case '/adm/dashboard/alterar-funcionario':
        FuncionarioController::alterar();
    break;

    case '/adm/dashboard/excluir-funcionario':
        FuncionarioController::excluir();
    break;

    case '/adm/dashboard/cadastro-curso':
        CursoController::cadastrar();
    break;

    case '/adm/dashboard/listar-curso':
        CursoController::listar();
    break;

    case '/adm/dashboard/alterar-curso':
        CursoController::alterar();
    break;

    case '/adm/dashboard/excluir-curso':
        CursoController::excluir();
    break;

    case '/adm/dashboard/cadastro-armario':
        ArmarioController::cadastrar();
    break;

    case '/adm/dashboard/listar-armario':
        ArmarioController::listar();
    break;

    case '/armarios':
        ArmarioController::listarSelecao();
    break;
    
    case '/adm/dashboard/alterar-armario':
        ArmarioController::alterar();
    break;

    case '/adm/dashboard/excluir-armario':
        ArmarioController::excluir();
    break;
    
    case '/checkout':
        AluguelController::checkout();
    break;

    case '/reserva':
        AluguelController::reserva();
    break;

    default:
        echo "Erro 404";
    break;
    
}

?>