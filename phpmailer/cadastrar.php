<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/vendor/autoload.php';

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['cadnome'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
} elseif (empty($dados['cademail'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>"];
} elseif (empty($dados['cadsenha'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>"];
} else {

    $query_usuario_pes = "SELECT id FROM usuarios WHERE email=:email LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario_pes);
    $result_usuario->bindParam(':email', $dados['cademail'], PDO::PARAM_STR);
    $result_usuario->execute();

    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: O e-mail já está cadastrado!</div>"];
    } else {

        $query_usuario = "INSERT INTO usuarios (nome, email, senha, chave) VALUES (:nome, :email, :senha, :chave)";
        $cad_usuario = $conn->prepare($query_usuario);
        $cad_usuario->bindParam(':nome', $dados['cadnome'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':email', $dados['cademail'], PDO::PARAM_STR);
        $senha_cript = password_hash($dados['cadsenha'], PASSWORD_DEFAULT);
        $cad_usuario->bindParam(':senha', $senha_cript, PDO::PARAM_STR);
        $chave = password_hash($dados['cademail'] . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
        $cad_usuario->bindParam(':chave', $chave, PDO::PARAM_STR);

        $cad_usuario->execute();

        if ($cad_usuario->rowCount()) {

            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->CharSet = "UTF-8";
                $mail->isSMTP();
                $mail->Host       = 'smtp.mailtrap.io';
                $mail->SMTPAuth   = true;
                $mail->Username   = '91dda483e52a50';
                $mail->Password   = '28ab83bb47006d';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 2525;

                //Recipients
                $mail->setFrom('cesar@celke.com.br', 'Cesar');
                $mail->addAddress($dados['cademail'], $dados['cadnome']);

                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Confirma o e-mail';
                $mail->Body    = "Prezado(a) " . $dados['cadnome'] . ".<br><br>Agradecemos a sua solicitação de cadastramento em nosso site!<br><br>Para que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicanco no link abaixo: <br><br> <a href='http://localhost/celke/confirmar-email.php?chave=$chave'>Clique aqui</a><br><br>Esta mensagem foi enviada a você pela empresa XXX.<br>Você está recebendo porque está cadastrado no banco de dados da empresa XXX. Nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais.<br><br>" ;
                $mail->AltBody = "Prezado(a) " . $dados['cadnome'] . ".\n\nAgradecemos a sua solicitação de cadastramento em nosso site!\n\nPara que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicanco no link abaixo: \n\n http://localhost/celke/confirmar-email.php?chave=$chave \n\nEsta mensagem foi enviada a você pela empresa XXX.\nVocê está recebendo porque está cadastrado no banco de dados da empresa XXX. Nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais.\n\n";

                $mail->send();

                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso. Necessário acessar a caixa de e-mail para confimar o e-mail!</div>"];

            } catch (Exception $e) {
                //$retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];

                $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso.</div>"];
            }
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
        }
    }
}

echo json_encode($retorna);
