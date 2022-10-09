<?php 

if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();

    include_once 'connection/Connection.php';
    include_once 'model/Pessoa.php';
    include_once 'model/Aluno.php';
    include_once 'dao/AlunoDAO.php';

    $alunodao = new AlunoDAO();
    $aluno = $alunodao->read($_SESSION['id']);
    
}

//session_regenerate_id();

if (!isset($_SESSION['authenticate'])) {
    header('Location: /');
}

?>