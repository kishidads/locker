<?php


include('connection/Connection.php');
include_once('dao/AuthenticationDAO.php');


class ConfEmail
{


    public function confirmarPurl()
    {


        try {

            $purl = $_GET['purl'];


            //verifica se existe sessao ativa - se sim; retornar para home
             if (isset($_SESSION['authenticate'])) {
                 header('Location: /');
                 return false;
             }

            //verifica se existe na url string um purl
            if (!isset($purl)) {
                header('Location: /');
                return false;
            }
            //verifica se o purl é valido 
            if (strlen($purl)  != 12) {
                header('Location: /');
                return false;
            }
        } catch (Exception $e) {
            echo 'Erro ao confirmar o purl' . $e . '<br>';
        }
    }

    /*
passos : 1. conectar ao bd
         2. pesquisa a existencia de algum aluno com o purl indicado 
         nao existe? Erro
         Existe?
                a. remover o purl do aluno 
                b. altera o ativo de 0 para 1
                c. apresenta mensagem de cadastro concluido com sucesso    

*/

    public  function validarEmail()
    {

        try {

            $token = $_GET['purl'];

            //echo ($token);         
            //$params = [':purl' => $purl->getPurl()];

            $sql = 'SELECT * FROM `aluno` WHERE purl = :purl';
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindValue(':purl', $token);
            //$stmt->bindValue(':purl', $purl->getPurl());            
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";

            //$id_aluno = $data['id'];

            // echo($id_aluno);

            //echo '<br><br>';

            $cpf_aluno = $data['cpf'];

            //echo($cpf_aluno);

            // $data = $stmt->fetch(PDO::FETCH_NUM);

            // echo "<pre>";
            // print_r($data);
            //  echo "</pre>";

            $result = $stmt->rowCount();


            //verifica se foi encontrado o cliente

            if ($result == 0) {

                $erro = '<div class="alert alert-danger" role="alert">
                Não Existe nenhum registro com este purl, verifique novamente sua caixa de email
            </div> ';

                echo ($erro);

                header("Refresh: 10; url='/");
                return false;
            }

            if ($result > 1) {
                $erro = '<div class="alert alert-danger" role="alert">
                Existe mais de um Registro com este link de validação, Por favor reporte para a administração do sistema.
           </div> ';

           header("Refresh: 10; url='/cadastro");

                echo ($erro);
                return false;
            }
            //atualizar os dados do cliente apos clicar no link CAMPOS ativo e purl Aonde o CPF unico extraido existe
            $update = 'UPDATE aluno SET purl = :purl , ativo = :ativo WHERE cpf = :cpf';

            $stmt = Connection::getConnection()->prepare($update);

            $stmt->bindValue(':purl', NULL);
            $stmt->bindValue(':ativo', 1);
            $stmt->bindValue(':cpf', $cpf_aluno);
            $stmt->execute();


            $sucess = $sucesso = '<div class="alert alert-success" role="alert">
                                   A VALIDAÇÃO FOI EFETUADA COM SUCESSO, VOCE SERA REDIRECIONADO PARA A PAGINA DE LOGIN EM 10 SEGUNDOS
                                  </div>';

                                  header("Refresh: 10; url='/login");

            echo ($sucess);
        } catch (Exception $e) {
            echo 'Erro ao validar o purl' . $e . '<br>';
        }
    }
}
