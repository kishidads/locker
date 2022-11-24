<?php

class ArmarioController {

    public static function cadastrar() {
        
        require_once 'adm-session.php';

        if (isset($_POST['cadastrar'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Armario.php';
            include_once 'dao/ArmarioDAO.php';
            include_once 'controller/Filter.php';
    
/*             $filter = new Filter();
        
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
        
            $data = $filter->sanitize($_POST, $filters); */
        
            echo 'Sanitização:<br><pre>' , var_dump($_POST) , '</pre>';

            $data = $_POST;
        
            $armario = new Armario();
        
            $armario->setSecao($data['secao']);
            $armario->setLocal($data['local']);
            $armario->setAndar($data['andar']);
            $armario->setSituacao($data['situacao']);
                   
            $armariodao = new ArmarioDAO();
            
            $armariodao->create($armario, $data['quantidade']);
        
        }
        
        header('Location: /adm/dashboard/listar-armario');
        die();
        
    }

    public static function listar() {
        
        require_once 'adm-session.php';
        
        include_once 'connection/Connection.php';
        include_once 'model/Armario.php';
        include_once 'dao/ArmarioDAO.php';
        include_once 'controller/Filter.php';

        $armariodao = new ArmarioDAO();

        $locais = $armariodao->readLocal();

        $andares = $armariodao->readFloor();
        
        $situacoes = $armariodao->readSituation();
        
        $armarios = $armariodao->readAll();
        
        //echo '<pre>' , var_dump($armarios) , '</pre>';
       
        include 'view/dashboard/listar-armario.php';
        
    }

    public static function listarSelecao() {
        
        require_once 'session.php';

        include_once 'connection/Connection.php';
        include_once 'model/Armario.php';
        include_once 'dao/ArmarioDAO.php';
        include_once 'controller/Filter.php';

        $armariodao = new ArmarioDAO();

        $locais = $armariodao->readLocal();

        if (isset($_GET['listar'])) {
    
            $local = $_GET['local'];
        
            $armarios = $armariodao->readSelection($local);
        
            //echo '<pre>' , var_dump($_GET) , '</pre>';

        }
        
        include 'view/armarios/armarios.php';
        
    }

    public static function alterar() {

        require_once 'adm-session.php';

        if (isset($_POST['alterar'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Armario.php';
            include_once 'dao/ArmarioDAO.php';
            include_once 'controller/Filter.php';
            
 /*         $filter = new Filter();
        
            $filters = array(
                'senha' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validatePassword')),  
                'nome' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validateName')),
                'sobrenome' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validateName')),
                'telefone' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validatePhone'))
            );
        
            $data = $filter->validate($_POST, $filters);
        
            echo 'Validação:<br><pre>' , var_dump($data) , '</pre>';
        
            $filters = array(
                'senha' => FILTER_UNSAFE_RAW,  
                'nome' => FILTER_SANITIZE_SPECIAL_CHARS,
                'sobrenome' => FILTER_SANITIZE_SPECIAL_CHARS,
                'telefone' => FILTER_UNSAFE_RAW
            );
        
            $data = $filter->sanitize($_POST, $filters); */

            $data = $_POST;
        
            //echo 'Sanitização:<br><pre>' , var_dump($data) , '</pre>';
               
            $armario = new Armario();
        
            $armario->setId($data['id']);
            $armario->setSecao($data['secao']);
            $armario->setNumero($data['numero']);
            $armario->setLocal($data['local']);
            $armario->setAndar($data['andar']);
            $armario->setSituacao($data['situacao']);

            $armariodao = new ArmarioDAO();

            $armariodao->update($armario);
            
        }
        
        header('Location: /adm/dashboard/listar-armario');
        die();

    }

    public static function excluir() {
        
        require_once 'adm-session.php';

        if (isset($_POST['excluir'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Armario.php';
            include_once 'dao/ArmarioDAO.php';
            include_once 'controller/Filter.php';

            $data = $_POST;

            $armario = new Armario();

            $armario->setId($data['id']);

            $armariodao = new ArmarioDAO();

            $armariodao->delete($armario);

        }

        header('Location: /adm/dashboard/listar-armario');
        die();

    }

}

