<?php 

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();

    $alunodao = new AlunoDAO();
    $aluno = $alunodao->read($_SESSION['id']);
}

//session_regenerate_id();

if (!isset($_SESSION['authenticate'])) {
    header('Location: /');
}

?>