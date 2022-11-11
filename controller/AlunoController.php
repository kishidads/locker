<?php

class AlunoController {

    public static function cadastrar() {

        if (isset($_POST['cadastrar'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Pessoa.php';
            include_once 'model/Aluno.php';
            include_once 'dao/AlunoDAO.php';
            include_once 'controller/Filter.php';
        
            $filter = new Filter();
        
            $filters = array(
                'cpf' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validateCPF')),
                'email' => FILTER_VALIDATE_EMAIL,
                'senha' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validatePassword')),  
                'nome' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validateName')),
                'sobrenome' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validateName')),
                'telefone' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validatePhone')),
                'rm' => FILTER_VALIDATE_INT
            );
        
            $data = $filter->validate($_POST, $filters);
        
            echo 'Validação:<br><pre>' , var_dump($data) , '</pre>';
        
            $filters = array(
                'cpf' => FILTER_UNSAFE_RAW,
                'email' => FILTER_SANITIZE_EMAIL,
                'senha' => FILTER_UNSAFE_RAW,  
                'nome' => FILTER_SANITIZE_SPECIAL_CHARS,
                'sobrenome' => FILTER_SANITIZE_SPECIAL_CHARS,
                'telefone' => FILTER_UNSAFE_RAW,
                'rm' => FILTER_SANITIZE_NUMBER_INT
            );
        
            $data = $filter->sanitize($_POST, $filters);
        
            echo 'Sanitização:<br><pre>' , var_dump($data) , '</pre>';
            
            $aluno = new Aluno();
        
            $aluno->setCpf($data['cpf']);
            $aluno->setEmail($data['email']);
            $aluno->setSenha($data['senha']);
            $aluno->setNome($data['nome']);
            $aluno->setSobrenome($data['sobrenome']);
            $aluno->setTelefone($data['telefone']);
            $aluno->setRm($data['rm']);
            
            $alunodao = new AlunoDAO();
            $alunodao->create($aluno);
        
        }
        
        include_once 'view/aluno/cadastro.php';

    }

    public static function selecionar() {

        require_once 'session.php';
        
        include_once 'connection/Connection.php';
        include_once 'model/Pessoa.php';
        include_once 'model/Aluno.php';
        include_once 'dao/AlunoDAO.php';
        include_once 'controller/Filter.php';

        $aluno = new Aluno();

        $aluno->setId($_SESSION['id']);

        $alunodao = new AlunoDAO();

        $aluno = $alunodao->read($aluno->getId());
        
        //echo '<pre>' , var_dump($alunos) , '</pre>';

        include 'view/aluno/meu-cadastro.php';

    }

    public static function listar() {
        
        require_once 'session.php';
        
        include_once 'connection/Connection.php';
        include_once 'model/Pessoa.php';
        include_once 'model/Aluno.php';
        include_once 'dao/AlunoDAO.php';
        include_once 'controller/Filter.php';

        $alunodao = new AlunoDAO();

        $alunos = $alunodao->readAll();
        
        //echo '<pre>' , var_dump($alunos) , '</pre>';

        include 'view/aluno/listar-aluno.php';
        
    }

    public static function alterar() {

        require_once 'session.php';
    
        if (isset($_POST['alterar'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Pessoa.php';
            include_once 'model/Aluno.php';
            include_once 'dao/AlunoDAO.php';
            include_once 'controller/Filter.php';

            $filter = new Filter();
        
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
        
            $data = $filter->sanitize($_POST, $filters);
        
            echo 'Sanitização:<br><pre>' , var_dump($data) , '</pre>';
               
            $aluno = new Aluno();
        
            $aluno->setSenha($data['senha']);
            $aluno->setNome($data['nome']);
            $aluno->setSobrenome($data['sobrenome']);
            $aluno->setTelefone($data['telefone']);

            if (isset($_SESSION['authenticate'])) {
                $aluno->setId($_SESSION['id']);
            } else {
                $aluno->setId($data['id']);
            }
                    
            $alunodao = new AlunoDAO();

            $alunodao->update($aluno);
            
        }
        
        header('Location: /meu-cadastro');
        die();

    }

    public static function excluir() {
        
        require_once 'session.php';

        if (isset($_POST['excluir'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Pessoa.php';
            include_once 'model/Aluno.php';
            include_once 'dao/AlunoDAO.php';
            include_once 'controller/Filter.php';

            $data = $_POST;

            echo '<br><pre>' , var_dump($data) , '</pre>'; 

            $aluno = new Aluno();
            
            $aluno->setId($data['id']);

            echo '<br><pre>' , var_dump($aluno) , '</pre>';

            $alunodao = new AlunoDAO();

            $alunodao->delete($aluno);

        }

        header('Location: /listar-aluno');
        die();

    }

}
