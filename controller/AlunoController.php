<?php
include_once '../conexao/Conexao.php';
include_once '../model/Pessoa.php';
include_once '../model/Aluno.php';
include_once '../dao/AlunoDAO.php';

$d = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){
    
    $aluno = new Aluno(($d['cpf']), $d['email'], $d['senha'], $d['nome'], $d['sobrenome'], $d['rm']);
    
    /*
    $aluno->setCpf($d['cpf']);
    $aluno->setEmail($d['email']);
    $aluno->setSenha($d['senha']);
    $aluno->setNome($d['nome']);
    $aluno->setSobrenome($d['sobrenome']);
    $aluno->setRm($d['rm']);
    */
    
    $alunodao = new AlunoDAO();
    $alunodao->create($aluno);

    //header('Location: ');
} 