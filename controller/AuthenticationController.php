<?php

class AuthenticationController {

    public static function entrar() {

        if (isset($_POST['entrar'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Authentication.php';
            include_once 'dao/AuthenticationDAO.php';
            include_once 'controller/Filter.php';
        
            $filter = new Filter();
        
            $filters = array(
                'cpf' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validateCPF')),
                'senha' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validatePassword'))
            );
        
            $data = $filter->validate($_POST, $filters);
        
            //echo 'Validação:<br><pre>' , var_dump($data) , '</pre>';
            
            $login = new Authentication();

            $login->setCpf($_POST['cpf']);
            $login->setSenha($_POST['senha']);
        
            $authenticationdao = new AuthenticationDAO();

            $data = $authenticationdao->authenticate($login->getCpf());
            
            if ($login->login($data)) {         
                header('Location: /meu-cadastro');
                die();
            }
        
        }

        include 'view/aluno/login.php';

    }

    public static function sair() {

        if (isset($_POST['sair'])) {
        
            include_once 'model/Authentication.php';
            
            $logout = new Authentication();

            $logout->logout();
        
        }

    }
 
}

?>