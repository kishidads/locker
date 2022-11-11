<?php

class CursandoController {

    public static function cadastrar() {

        if (isset($_POST['cadastrar'])) {

            require_once 'session.php';

            include_once 'connection/Connection.php';
            include_once 'model/Aluno.php';
            include_once 'model/Curso.php';
            include_once 'model/Cursando.php';
            include_once 'dao/CursandoDAO.php';
            include_once 'controller/Filter.php';

            $alunodao = new AlunoDAO();
            $aluno = $alunodao->read($_SESSION['id']);
    
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
            ); */
        
            //$data = $filter->sanitize($_POST, $filters);
        
            //echo 'Sanitização:<br><pre>' , var_dump($_POST) , '</pre>'; 
        
            $data = $_POST;

            $aluno = new Aluno();

            $aluno->setId($_SESSION['id']);

            $curso = new Curso();

            $curso->setCodigoCurso($data['codigoCurso']);

            $cursando = new Cursando();
        
            $cursando->setAluno($data['codigoCursando']);
            $cursando->setCurso($data['codigoCursando']);
            $cursando->setModulo($data['duracao']);
            $cursando->setPeriodo($data['periodo']);
            $cursando->setSituacaoMatricula($data['situacaoMatricula']);
            
            $cursandodao = new CursandoDAO();
            $cursandodao->create($cursando);
        
            //header('Location: /listar-cursandos'); die();
        }

        include 'view/cursando/cadastro-cursando.php';
        
    }

    /* public static function listar() {
        
        require_once 'session.php';
        
        include_once 'connection/Connection.php';
        include_once 'model/Cursando.php';
        include_once 'dao/CursandoDAO.php';
        include_once 'controller/Filter.php';

        if (isset($_POST['listar'])) {
    
            $local = $_POST['local'];
        
            $cursandodao = new CursandoDAO();
            $cursandos = $cursandodao->read($local);
        
            //echo '<pre>' , var_dump($cursandos) , '</pre>';

        }
        
        include 'view/cursandos/listar-cursandos.php';
        
    } */

}

