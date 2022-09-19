<?php

class AlunoDAO {
    
    public function create(Aluno $aluno) {

        //echo '<pre>' , var_dump($aluno) , '</pre>';
        //echo $aluno->getNome();

        try {
            $sql = 'INSERT INTO aluno (rm, cpf, email, senha, nome, sobrenome, modulo, periodo, situacao_matricula)
            VALUES (:rm, :cpf, :email, :senha, :nome, :sobrenome, :modulo, :periodo, :situacaoMatricula)';

            $statement = Conexao::getConexao()->prepare($sql);

            $statement->bindValue(':rm', $aluno->getRm(), PDO::PARAM_INT);
            $statement->bindValue(':cpf', $aluno->getCpf(), PDO::PARAM_STR);
            $statement->bindValue(':email', $aluno->getEmail(), PDO::PARAM_STR);
            $statement->bindValue(':senha', $aluno->getSenha(), PDO::PARAM_STR);
            $statement->bindValue(':nome', $aluno->getNome(), PDO::PARAM_STR);
            $statement->bindValue(':sobrenome', $aluno->getSobrenome(), PDO::PARAM_STR);
            $statement->bindValue(':modulo', $aluno->getModulo(), PDO::PARAM_INT);
            $statement->bindValue(':periodo', $aluno->getPeriodo(), PDO::PARAM_STR);
            $statement->bindValue(':situacaoMatricula', $aluno->getSituacaoMatricula(), PDO::PARAM_STR);
            
            return $statement->execute();
        } catch (Exception $e) {
            echo 'Erro ao inserir aluno<br><br>' . $e . '<br>';
        }

    }
    
}

?>