<?php

class ArmarioDAO {
    
    public function create(Armario $armario, $quantity) {

        echo '<pre>' , var_dump($armario) , '</pre>';
    
        for ($i = 1; $i <= $quantity; $i++) {
            try {
                
                $sql =
                'INSERT INTO armario (secao, numero, local, andar, situacao)
                VALUES (:secao, :numero, :local, :andar, :situacao);';

                $stmt = Connection::getConnection()->prepare($sql);

                $stmt->bindValue(':secao', $armario->getSecao(), PDO::PARAM_STR);
                $stmt->bindValue(':numero', $i, PDO::PARAM_INT);
                $stmt->bindValue(':local', $armario->getLocal(), PDO::PARAM_STR);
                $stmt->bindValue(':andar', $armario->getAndar(), PDO::PARAM_INT);
                $stmt->bindValue(':situacao', $armario->getSituacao(), PDO::PARAM_STR);

                $stmt->execute();

                } catch (Exception $e) {
        
                echo 'Erro ao inserir armários.<br>' . $e . '<br>';

            }
        }
    }

    public function readSelection($local) {

        try {
            $sql = 'SELECT *
            FROM armario
            WHERE local = :local
            ORDER BY secao, numero ASC';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':local', $local);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $list = array();

            foreach ($data as $row) {

                $list[] = $this->list($row);

            }


            return $list;

        } catch (Exception $e) {

            echo 'Erro ao selecionar armários.<br>' . $e . '<br>';

        }

    }

    public function readAll() {

        try {
            $sql = 'SELECT *
            FROM armario
            ORDER BY secao, numero ASC';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $list = array();

            foreach ($data as $row) {

                $list[] = $this->list($row);

            }


            return $list;

        } catch (Exception $e) {

            echo 'Erro ao selecionar armários.<br>' . $e . '<br>';

        }

    }

    private function list($row) {

        $armario = new Armario();
        $armario->setId($row['id']);
        $armario->setSecao($row['secao']);
        $armario->setNumero($row['numero']);
        $armario->setLocal($row['local']);
        $armario->setAndar($row['andar']);
        $armario->setSituacao($row['situacao']);

        return $armario;

    }

    public function update(Armario $armario) {

        try {

            $sql = 'UPDATE armario
            SET secao = :secao, numero = :numero, local = :local, andar = :andar, situacao = :situacao
            WHERE id = :id;';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':secao', $armario->getSecao(), PDO::PARAM_STR);
            $stmt->bindValue(':numero', $armario->getNumero(), PDO::PARAM_INT);
            $stmt->bindValue(':local', $armario->getLocal(), PDO::PARAM_STR);
            $stmt->bindValue(':andar', $armario->getAndar(), PDO::PARAM_INT);
            $stmt->bindValue(':situacao', $armario->getSituacao(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $armario->getId(), PDO::PARAM_INT);

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar atualizar armário.<br>' . $e . '<br>';

        }

    }

    public function delete(Armario $armario) {

        try {

            $sql = 'DELETE FROM armario
            WHERE id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $armario->getId());

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar excluir armário.<br>' . $e . '<br>';

        }

    }
        
}

?>