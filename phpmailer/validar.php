<?php
session_start();
include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

/*$dados = [
    "email" => "cesar@celke.com.br",
    "senha" => "123456"
];*/

if(empty($dados['email'])){
    $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo usuário!</div>"];
}elseif(empty($dados['senha'])){
    $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>"];
}else{
    $query_usuario = "SELECT id, nome, email, senha, sits_usuario_id
                FROM usuarios
                WHERE email=:email
                LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $result_usuario->execute();

    if(($result_usuario) and ($result_usuario->rowCount() != 0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

        if($row_usuario['sits_usuario_id'] != 1){
            $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário confirma o e-mail!</div>"];
        }elseif(password_verify($dados['senha'], $row_usuario['senha'])){
            $_SESSION['id'] =  $row_usuario['id'];
            $_SESSION['nome'] =  $row_usuario['nome'];

            $retorna = ['erro'=> false, 'dados' => $row_usuario];
        }else{
            $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário ou a senha inválida!</div>"];
        }        
    }else{
        $retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário ou a senha inválida!</div>"];
    }    
}

echo json_encode($retorna);