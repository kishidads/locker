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

            $stmt = Connection::getConnection()->prepare($sql);

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

    public function read($id) {

        try {

            $sql = 'SELECT aluno.id, rm, cpf, email, senha, nome, sobrenome, telefone
            FROM aluno INNER JOIN telefone_aluno telefone
            ON aluno.id = telefone.id_aluno
            WHERE aluno.id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            $aluno = new Aluno();

            $aluno->setCpf($data['cpf']);
            $aluno->setEmail($data['email']);
            $aluno->setSenha($data['senha']);
            $aluno->setNome($data['nome']);
            $aluno->setSobrenome($data['sobrenome']);
            $aluno->setTelefone($data['telefone']);
            $aluno->setRm($data['rm']);
            $aluno->setId($data['id']);
            
            return $aluno;

        } catch (Exception $e) {

            echo 'Erro ao selecionar aluno.<br>' . $e . '<br>';

        }

    }
     
    public function update(Aluno $aluno) {

        try {

            $sql = 'START TRANSACTION;
            UPDATE aluno SET senha = :senha, nome = :nome, sobrenome = :sobrenome
            WHERE id = :id;
            UPDATE telefone_aluno SET telefone = :telefone
            WHERE id_aluno = :id;
            COMMIT;';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':senha', $aluno->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $aluno->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':sobrenome', $aluno->getSobrenome(), PDO::PARAM_STR);
            $stmt->bindValue(':telefone', $aluno->getTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar fazer atualizar aluno.<br>' . $e . '<br>';

        }

    }

/*

    public function delete(Aluno $aluno) {

        try {

            $sql = 'DELETE FROM aluno WHERE id = :id';
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindValue(':id', $aluno->getId());

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar excluir aluno.<br>' . $e . '<br>';

        }

    }
    
*/
    
}

?>