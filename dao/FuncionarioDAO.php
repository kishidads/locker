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

            echo 'Erro ao inserir funcionário.<br>' . $e . '<br>';

        }

    }

/*     public function read($id) {

        try {

            $sql = 'SELECT funcionario.id, cpf, email, senha, nome, sobrenome, funcao, privilegio, telefone
            FROM funcionario INNER JOIN telefone_funcionario telefone
            ON funcionario.id = telefone.id_funcionario
            WHERE funcionario.id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {

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

            }
    
            return $data;

        } catch (Exception $e) {

            echo 'Erro ao selecionar funcionário.<br>' . $e . '<br>';

        }

    } */

    public function readAll() {

        try {
            $sql = 'SELECT funcionario.id, cpf, email, nome, sobrenome, funcao, privilegio, telefone
            FROM funcionario INNER JOIN telefone_funcionario telefone
            ON funcionario.id = telefone.id_funcionario
            ORDER BY nome ASC';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $list = array();

            foreach ($data as $row) {

                $list[] = $this->list($row);

            }

            return $list;

        } catch (Exception $e) {

            echo 'Erro ao selecionar funcinários.<br>' . $e . '<br>';

        }

    }

    private function list($row) {

        $funcionario = new Funcionario();

        $funcionario->setId($row['id']);
        $funcionario->setCpf($row['cpf']);
        $funcionario->setEmail($row['email']);
        $funcionario->setNome($row['nome']);
        $funcionario->setSobrenome($row['sobrenome']);
        $funcionario->setFuncao($row['funcao']);
        $funcionario->setPrivilegio($row['privilegio']);
        $funcionario->setTelefone($row['telefone']);

        return $funcionario;

    }
     
    public function update(Funcionario $funcionario) {

        try {

            $sql = 'START TRANSACTION;
            UPDATE funcionario SET cpf = :cpf, email = :email, nome = :nome, sobrenome = :sobrenome, funcao = :funcao, privilegio = :privilegio 
            WHERE id = :id;
            UPDATE telefone_funcionario SET telefone = :telefone
            WHERE id_funcionario = :id;
            COMMIT;';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':cpf', $funcionario->getCpf(), PDO::PARAM_STR);
            $stmt->bindValue(':email', $funcionario->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $funcionario->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':sobrenome', $funcionario->getSobrenome(), PDO::PARAM_STR);
            $stmt->bindValue(':funcao', $funcionario->getFuncao(), PDO::PARAM_STR);
            $stmt->bindValue(':privilegio', $funcionario->getPrivilegio(), PDO::PARAM_STR);
            $stmt->bindValue(':telefone', $funcionario->getTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $funcionario->getId(), PDO::PARAM_INT);
            
            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar atualizar funcionário.<br>' . $e . '<br>';

        }

    }

    public function delete(Funcionario $funcionario) {

        try {

            $sql = 'START TRANSACTION;
            DELETE FROM telefone_funcionario
            WHERE id_funcionario = :id;
            DELETE FROM funcionario
            WHERE id = :id;
            COMMIT;';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $funcionario->getId());

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar excluir funcionário.<br>' . $e . '<br>';

        }

    }
        
}

?>