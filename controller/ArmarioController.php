<?php

class ArmarioController {

    public static function cadastrar() {

        if (isset($_POST['cadastrar'])) {

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
                'proximidade' => FILTER_SANITIZE_SPECIAL_CHARS,  
                'andar' => FILTER_SANITIZE_NUMBER_INT,
                'situacao' => FILTER_SANITIZE_SPECIAL_CHARS,
                'quantidade' => FILTER_SANITIZE_NUMBER_INT
            );
        
            $data = $filter->sanitize($_POST, $filters);
        
            echo 'Sanitização:<br><pre>' , var_dump($_POST) , '</pre>'; 
        
            $armario = new Armario();
        
            $armario->setSecao($data['secao']);
            $armario->setProximidade($data['proximidade']);
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
        
        include_once 'connection/Connection.php';
        include_once 'model/Armario.php';
        include_once 'dao/ArmarioDAO.php';
        include_once 'controller/Filter.php';
        require_once 'session.php';

        if (isset($_POST['listar'])) {
    
            $proximidade = $_POST['proximidade'];
        
            $armariodao = new ArmarioDAO();
            $armarios = $armariodao->read($proximidade);
        
            echo '<pre>' , var_dump($armarios) , '</pre>';

            
        }
        
        include 'view/armarios/armarios.php';
        
    }

}

