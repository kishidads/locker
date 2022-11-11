<?php

class AluguelDAO {
    
    public function create(Aluguel $aluguel) {

        //echo '<pre>' , var_dump($aluguel) , '</pre>';

        try {

            $sql = 'INSERT INTO aluguel (data, situacao, id_aluno, id_armario, id_plano)
            VALUES (:data, :situacao, :id_aluno, :id_armario, :id_plano)';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':data', $aluguel->getData(), PDO::PARAM_STR);
            $stmt->bindValue(':situacao', $aluguel->getSituacao(), PDO::PARAM_STR);
            $stmt->bindValue(':id_aluno', $aluguel->getIdAluno(), PDO::PARAM_INT);
            $stmt->bindValue(':id_armario', $aluguel->getIdArmario(), PDO::PARAM_INT);
            $stmt->bindValue(':id_plano', $aluguel->getIdPlano(), PDO::PARAM_INT);
            
            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao inserir aluguel.<br>' . $e . '<br>';

        }

    }

    public function read($id) {

        try {

            $sql = 'SELECT *
            FROM aluguel
            WHERE id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $id);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            $aluguel = new Aluguel();

            $aluguel->setId($data['id']);
            $aluguel->setSituacao($data['data']);
            $aluguel->setIdAluno($data['situacao']);
            $aluguel->setIdArmario($data['id_aluno']);
            $aluguel->setIdAluno($data['id_armario']);
            $aluguel->setIdPlano($data['id_plano']);
            
            return $aluguel;

        } catch (Exception $e) {

            echo 'Erro ao selecionar aluguel.<br>' . $e . '<br>';

        }

    }

    public function readAll() {

        try {
            $sql = 'SELECT *
            FROM aluguel';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $list = array();

            foreach ($data as $row) {

                $list[] = $this->list($row);

            }


            return $list;

        } catch (Exception $e) {

            echo 'Erro ao selecionar aluguel.<br>' . $e . '<br>';

        }

    }

    private function list($row) {

        $aluguel = new Aluguel();

        $aluguel->setId($row['id']);
        $aluguel->setSituacao($row['data']);
        $aluguel->setIdAluno($row['situacao']);
        $aluguel->setIdArmario($row['id_aluno']);
        $aluguel->setIdAluno($row['id_armario']);
        $aluguel->setIdPlano($row['id_plano']);

        return $aluguel;

    }

    public function update(Aluguel $aluguel) {

        try {

            $sql = 'UPDATE aluguel
            SET data = :data, situacao = :situacao, id_aluno = :id_aluno, id_armario = :id_armario, id_plano = :id_plano
            WHERE id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':data', $aluguel->getData(), PDO::PARAM_STR);
            $stmt->bindValue(':situacao', $aluguel->getSituacao(), PDO::PARAM_STR);
            $stmt->bindValue(':id_aluno', $aluguel->getIdAluno(), PDO::PARAM_INT);
            $stmt->bindValue(':id_armario', $aluguel->getIdArmario(), PDO::PARAM_INT);
            $stmt->bindValue(':id_plano', $aluguel->getIdPlano(), PDO::PARAM_INT);
            $stmt->bindValue(':id', $aluguel->getId(), PDO::PARAM_INT);

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar atualizar aluguel.<br>' . $e . '<br>';

        }

    }

    public function delete(Aluguel $aluguel) {

        try {

            $sql = 'DELETE FROM aluguel
            WHERE id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $aluguel->getId());

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar excluir aluguel.<br>' . $e . '<br>';

        }

    }

/*     public function count() {

        try {

            $sql = 'SELECT COUNT(id) AS total FROM aluguel';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data["total"];

        } catch (Exception $e) {

            echo 'Erro ao tentar contar aluguel.<br>' . $e . '<br>';

        }

    } */
        
}

?>