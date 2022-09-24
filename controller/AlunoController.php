<?php
include_once '../conexao/Conexao.php';
include_once '../model/Pessoa.php';
include_once '../model/Aluno.php';
include_once '../dao/AlunoDAO.php';

// Retirando espaços no início e final de uma string

/*

function trimValue(&$value) {
    $value = trim($value); 
}

array_walk($_POST, 'trimValue');

*/

$data = array_map('trim', $_POST);

$data = array_map('htmlspecialchars', $data);

$filters = array(
    'cpf' => FILTER_UNSAFE_RAW,
    'email' => FILTER_SANITIZE_EMAIL,
    'senha' => FILTER_UNSAFE_RAW,  
    'nome' => FILTER_UNSAFE_RAW,
    'sobrenome' => FILTER_UNSAFE_RAW,
    'telefone' => FILTER_UNSAFE_RAW,
    'rm' => FILTER_SANITIZE_NUMBER_INT
);

$data = filter_var_array($data, $filters);

echo '<pre>' , var_dump($data) , '</pre>';

if(isset($_POST['cadastrar'])){
    
    $aluno = new Aluno(($data['cpf']), $data['email'], $data['senha'], $data['nome'], $data['sobrenome'], $data['telefone'], $data['rm']);
    
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

    //header('Location: ../');
} 