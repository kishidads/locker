<?php

class AlunoDAO {
    
    public function create(Aluno $aluno) {

        //echo '<pre>' , var_dump($aluno) , '</pre>';

        try {

            $sql = 'START TRANSACTION;
            INSERT INTO aluno (rm, cpf, email, senha, nome, sobrenome)
            VALUES (:rm, :cpf, :email, :senha, :nome, :sobrenome);
            SELECT LAST_INSERT_ID() INTO @id;
            INSERT INTO telefone_aluno (telefone, id_aluno)
            VALUES(:telefone, @id);
            COMMIT;';

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(':rm', $aluno->getRm(), PDO::PARAM_INT);
            $stmt->bindValue(':cpf', $aluno->getCpf(), PDO::PARAM_STR);
            $stmt->bindValue(':email', $aluno->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':senha', $aluno->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $aluno->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':sobrenome', $aluno->getSobrenome(), PDO::PARAM_STR);
            $stmt->bindValue(':telefone', $aluno->getTelefone(), PDO::PARAM_STR);
            
            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao inserir aluno.<br>' . $e . '<br>';

        }

    }

/*  public function read(Aluno $aluno) {

        try {

            $sql = 'SELECT * FROM aluno WHERE id = :id';

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(':id', $aluno->getId());
            
            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao selecionar aluno.<br>' . $e . '<br>';

        }

    }
     
    public function update(Aluno $aluno) {

        try {

            $sql = 'UPDATE aluno SET
            rm = :rm, cpf = :cpf, email = :email, senha = :senha, nome = :nome, sobrenome = :sobrenome, telefone = :telefone
            WHERE id = :id';

            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(':rm', $aluno->getRm(), PDO::PARAM_INT);
            $stmt->bindValue(':cpf', $aluno->getCpf(), PDO::PARAM_STR);
            $stmt->bindValue(':email', $aluno->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':senha', $aluno->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $aluno->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':sobrenome', $aluno->getSobrenome(), PDO::PARAM_STR);
            $stmt->bindValue(':telefone', $aluno->getTelefone(), PDO::PARAM_STR);

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar fazer atualizar aluno.<br>' . $e . '<br>';

        }

    }

    public function delete(Aluno $aluno) {

        try {

            $sql = 'DELETE FROM aluno WHERE id = :id';
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(':id', $aluno->getId());

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar excluir aluno.<br>' . $e . '<br>';

        }

    } */
    
}

?>