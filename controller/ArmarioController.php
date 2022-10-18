<?php

class ArmarioController {

    public static function cadastrar() {

        if (isset($_POST['cadastrar'])) {

            require_once 'session.php';

            include_once 'connection/Connection.php';
            include_once 'model/Armario.php';
            include_once 'dao/ArmarioDAO.php';
            include_once 'controller/Filter.php';
    
            $filter = new Filter();
        
            $filters = array(
                'secao' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validateSecao')), 
                'andar' => FILTER_VALIDATE_BOOLEAN,
                'quantidade' => FILTER_VALIDATE_INT
            );
        
            $data = $filter->validate($_POST, $filters);
        
            echo 'Validação:<br><pre>' , var_dump($data) , '</pre>';
        
            $filters = array(
                'secao' => FILTER_SANITIZE_SPECIAL_CHARS,
                'local' => FILTER_SANITIZE_SPECIAL_CHARS,  
                'andar' => FILTER_SANITIZE_NUMBER_INT,
                'situacao' => FILTER_SANITIZE_SPECIAL_CHARS,
                'quantidade' => FILTER_SANITIZE_NUMBER_INT
            );
        
            $data = $filter->sanitize($_POST, $filters);
        
            //echo 'Sanitização:<br><pre>' , var_dump($_POST) , '</pre>'; 
        
            $armario = new Armario();
        
            $armario->setSecao($data['secao']);
            $armario->setLocal($data['local']);
            $armario->setAndar($data['andar']);
            $armario->setSituacao($data['situacao']);
        
            $quantity = $_POST['quantidade'];
            
            $armariodao = new ArmarioDAO();
            $armariodao->create($armario, $quantity);
        
            header('Location: /armarios');
        }

        include 'view/armarios/cadastro.php';
        
    }

    public static function listar() {
        
        require_once 'session.php';
        
        include_once 'connection/Connection.php';
        include_once 'model/Armario.php';
        include_once 'dao/ArmarioDAO.php';
        include_once 'controller/Filter.php';

        if (isset($_POST['listar'])) {
    
            $local = $_POST['local'];
        
            $armariodao = new ArmarioDAO();
            $armarios = $armariodao->read($local);
        
            //echo '<pre>' , var_dump($armarios) , '</pre>';

        }
        
        include 'view/armarios/armarios.php';
        
    }

}

