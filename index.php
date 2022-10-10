<?php

//include 'Controller/AlunoController.php';

require 'libs/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


include 'controller/EmailController.php';
require 'constants.php';    




$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url) {

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
    //$email =  new EnviarEmail();
    //$resultado = $email->confirmarEmail();


    

    $email_usu = 'locketec@gmail.com';

    $email =  new EnviarEmail();
    
    $resultado = $email->confirmarEmail($email_usu,$purl);

    if($resultado = true){
        echo 'Email Enviado Para confirmação';
    }else{
        echo 'Ocorreu um Erro no envio do email';
    }



        echo "Erro 404";
       

    break;
    
}

?>