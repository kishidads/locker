<?php

class CursoController {

    public static function cadastrar() {
        
        require_once 'session.php';

        if (isset($_POST['cadastrar'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Curso.php';
            include_once 'dao/CursoDAO.php';
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
            ); */
        
            //$data = $filter->sanitize($_POST, $filters);
        
            //echo 'Sanitização:<br><pre>' , var_dump($_POST) , '</pre>'; 
        
            $data = $_POST;

            $curso = new Curso();
        
            $curso->setCodigoCurso($data['codigo_curso']);
            $curso->setNome($data['nome']);
            $curso->setDuracao($data['duracao']);
            
            $cursodao = new CursoDAO();

            $cursodao->create($curso);
        
        }
        
        header('Location: /listar-curso');
        die();
        
    }

    public static function listar() {
        
        require_once 'session.php';
        
        include_once 'connection/Connection.php';
        include_once 'model/Curso.php';
        include_once 'dao/CursoDAO.php';
        include_once 'controller/Filter.php';

        $cursodao = new CursoDAO();
        
        $cursos = $cursodao->readAll();
        
        //echo '<pre>' , var_dump($cursos) , '</pre>';

        include 'view/curso/listar-curso.php';
        
    }

    public static function alterar() {

        require_once 'session.php';

        if (isset($_POST['alterar'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Curso.php';
            include_once 'dao/CursoDAO.php';
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
               
            $curso = new Curso();
        
            $curso->setId($data['id']);
            $curso->setCodigoCurso($data['codigo_curso']);
            $curso->setNome($data['nome']);
            $curso->setDuracao($data['duracao']);

            $cursodao = new CursoDAO();

            $cursodao->update($curso);
            
        }
        
        header('Location: /listar-curso');
        die();

    }

    public static function excluir() {
        
        require_once 'session.php';

        if (isset($_POST['excluir'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Curso.php';
            include_once 'dao/CursoDAO.php';
            include_once 'controller/Filter.php';

            $data = $_POST;

            $curso = new Curso();

            $curso->setId($data['id']);

            $cursodao = new CursoDAO();
            
            $cursodao->delete($curso);

        }

        header('Location: /listar-curso');
        die();

    }

}

