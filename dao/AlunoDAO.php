<?php

class AlunoDAO {
    
    public function create(Aluno $aluno) {

        echo '<pre>' . var_dump($aluno) . '</pre>';
        echo $aluno->getNome();

        try {
            $sql = 'INSERT INTO aluno (rm, cpf, email, senha, nome, sobrenome, modulo, periodo, situacao_matricula)
            VALUES (:rm, :cpf, :email, :senha, :nome, :sobrenome, :modulo, :periodo, :situacaoMatricula)';

            $statement = Conexao::getConexao()->prepare($sql);

            $statement->bindValue(':rm', $aluno->getRm());
            $statement->bindValue(':cpf', $aluno->getCpf());
            $statement->bindValue(':email', $aluno->getEmail());
            $statement->bindValue(':senha', $aluno->getSenha());
            $statement->bindValue(':nome', $aluno->getNome());
            $statement->bindValue(':sobrenome', $aluno->getSobrenome());
            $statement->bindValue(':modulo', $aluno->getModulo());
            $statement->bindValue(':periodo', $aluno->getPeriodo());
            $statement->bindValue(':situacaoMatricula', $aluno->getSituacaoMatricula());
            
            return $statement->execute();
        } catch (Exception $e) {
            echo 'Erro ao inserir aluno<br><br>' . $e . '<br>';
        }

    }

}

?>