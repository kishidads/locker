<?php

if (isset($_POST['cadastrar'])) {

    include_once '../connection/Connection.php';
    include_once '../model/Pessoa.php';
    include_once '../model/Aluno.php';
    include_once '../dao/AlunoDAO.php';
    include_once '../model/Filter.php';

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

    //Passando os dados pelo construtor
    
    //$aluno = new Aluno($data['cpf'], $data['email'], $data['senha'], $data['nome'], $data['sobrenome'], $data['telefone'], $data['rm']);
    
    //Passando os dados pelos métodos set

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

    //header('Location: ../');
}

if (isset($_POST['alterar'])) {

    include_once '../connection/Connection.php';
    include_once '../model/Pessoa.php';
    include_once '../model/Aluno.php';
    include_once '../dao/AlunoDAO.php';
    include_once '../model/Filter.php';
    require_once '../session.php';

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

    //Passando os dados pelos métodos set

    $aluno = new Aluno();

    $aluno->setSenha($data['senha']);
    $aluno->setNome($data['nome']);
    $aluno->setSobrenome($data['sobrenome']);
    $aluno->setTelefone($data['telefone']);
    $aluno->setId($_SESSION['id']);
    
    $alunodao = new AlunoDAO();
    $alunodao->update($aluno);

    //header('Location: ../');
}