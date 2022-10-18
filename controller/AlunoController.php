<?php

class AlunoController {

    public static function cadastrar() {

        if (isset($_POST['cadastrar'])) {

            include_once 'connection/Connection.php';
            include_once 'model/Pessoa.php';
            include_once 'model/Aluno.php';
            include_once 'dao/AlunoDAO.php';
            include_once 'controller/Filter.php';
            include_once '../controller/EnviarEmail.php';
    
            $email =  new EnviarEmail();
        
            $purl = EnviarEmail::criarhashes();
            //echo $purl;
        
        
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

            //============================================================
                
                //tentando achar um lugar certo para instanciar a classe EnviarEmail
                $email_usu = $_POST['email'];

                $resultado = $email->confirmarEmail($email_usu, $purl);

                if($resultado = true){
                    echo 'Email Enviado Para confirmação<br>';
                }else{
                    echo 'Ocorreu um Erro no envio do email';
                }

            //=========================================================
    
    echo $purl;
            
            $aluno = new Aluno();
        
            $aluno->setCpf($data['cpf']);
            $aluno->setEmail($data['email']);
            $aluno->setSenha($data['senha']);
            $aluno->setNome($data['nome']);
            $aluno->setSobrenome($data['sobrenome']);
            $aluno->setTelefone($data['telefone']);
            $aluno->setRm($data['rm']);
            $aluno->setPurl($purl);
            
            $alunodao = new AlunoDAO();
            $alunodao->create($aluno);
        
        }
        
        include_once 'view/aluno/cadastro.php';


    }

    public static function alterar() {


  
        require_once 'session.php';

        include_once 'connection/Connection.php';
        include_once 'model/Pessoa.php';
        include_once 'model/Aluno.php';
        include_once 'dao/AlunoDAO.php';
        include_once 'controller/Filter.php';

    
        $alunodao = new AlunoDAO();
        $aluno = $alunodao->read($_SESSION['id']);

        if (isset($_POST['alterar'])) {

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
            $aluno->setId($_SESSION['id']);
        
            $_SESSION['nome'] = $aluno->getNome();
            
            $alunodao = new AlunoDAO();
            $alunodao->update($aluno);
        
            //header('Location: ../');
            
        }

        include_once 'view/aluno/meu-cadastro.php';
        
    }


}

