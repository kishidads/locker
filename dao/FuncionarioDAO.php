<?php

class FuncionarioDAO {
    
    public function create(Funcionario $funcionario) {

        //echo '<pre>' , var_dump($funcionario) , '</pre>';

        try {

            $sql = 'START TRANSACTION;
            INSERT INTO funcionario (cpf, email, senha, nome, sobrenome, funcao, privilegio)
            VALUES (:cpf, :email, :senha, :nome, :sobrenome, :funcao, :privilegio);
            SELECT LAST_INSERT_ID() INTO @id;
            INSERT INTO telefone_funcionario (telefone, id_funcionario)
            VALUES(:telefone, @id);
            COMMIT;';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':cpf', $funcionario->getCpf(), PDO::PARAM_STR);
            $stmt->bindValue(':email', $funcionario->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':senha', $funcionario->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $funcionario->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':sobrenome', $funcionario->getSobrenome(), PDO::PARAM_STR);
            $stmt->bindValue(':funcao', $funcionario->getFuncao(), PDO::PARAM_STR);
            $stmt->bindValue(':privilegio', $funcionario->getPrivilegio(), PDO::PARAM_STR);
            $stmt->bindValue(':telefone', $funcionario->getTelefone(), PDO::PARAM_STR);
            
            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao inserir funcionario.<br>' . $e . '<br>';

        }

    }

    public function read($id) {

        try {

            $sql = 'SELECT funcionario.id, cpf, email, senha, nome, sobrenome, funcao, privilegio, telefone
            FROM funcionario INNER JOIN telefone_funcionario telefone
            ON funcionario.id = telefone.id_funcionario
            WHERE funcionario.id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            $funcionario = new Funcionario();

            $funcionario->setCpf($data['cpf']);
            $funcionario->setEmail($data['email']);
            $funcionario->setSenha($data['senha']);
            $funcionario->setNome($data['nome']);
            $funcionario->setSobrenome($data['sobrenome']);
            $funcionario->setFuncao($data['funcao']);
            $funcionario->setPrivilegio($data['privilegio']);
            $funcionario->setTelefone($data['telefone']);
            
            return $funcionario;

        } catch (Exception $e) {

            echo 'Erro ao selecionar funcionario.<br>' . $e . '<br>';

        }

    }
     
    public function update(Funcionario $funcionario) {

        try {

            $sql = 'START TRANSACTION;
            UPDATE funcionario SET senha = :senha, nome = :nome, sobrenome = :sobrenome
            WHERE id = :id;
            UPDATE telefone_funcionario SET telefone = :telefone
            WHERE id_funcionario = :id;
            COMMIT;';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':senha', $funcionario->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $funcionario->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':sobrenome', $funcionario->getSobrenome(), PDO::PARAM_STR);
            $stmt->bindValue(':telefone', $funcionario->getTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar fazer atualizar funcionario.<br>' . $e . '<br>';

        }

    }

/*

    public function delete(Funcionario $funcionario) {

        try {

            $sql = 'DELETE FROM funcionario WHERE id = :id';
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindValue(':id', $funcionario->getId());

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar excluir funcionario.<br>' . $e . '<br>';

        }

    }
    
*/
    
}

?>