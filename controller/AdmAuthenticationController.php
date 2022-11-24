<?php

class AdmAuthenticationController {

    public static function entrar() {

        if (isset($_POST['entrar'])) {

            include_once 'connection/Connection.php';
            include_once 'model/AdmAuthentication.php';
            include_once 'dao/AdmAuthenticationDAO.php';
            include_once 'controller/Filter.php';
        
            $filter = new Filter();
        
            $filters = array(
                'email' => FILTER_VALIDATE_EMAIL,
                'senha' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validatePassword'))
            );
        
            $data = $filter->validate($_POST, $filters);
        
            //echo 'Validação:<br><pre>' , var_dump($data) , '</pre>';
            
            $login = new AdmAuthentication();

            $login->setEmail($_POST['email']);
            $login->setSenha($_POST['senha']);
        
            $admauthenticationdao = new AdmAuthenticationDAO();

            $data = $admauthenticationdao->authenticate($login->getEmail());
            
            if ($login->login($data)) {         
                header('Location: /adm/dashboard/overview');
                die();
            }
        
        }

        include 'view/funcionario/adm-login.php';

    }

    public static function sair() {

        if (isset($_POST['sair'])) {
        
            include_once 'model/AdmAuthentication.php';
            
            $logout = new AdmAuthentication();

            $logout->logout();
        
        }

    }
 
}

?>