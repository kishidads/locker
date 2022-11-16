<?php

class CursandoDAO {
    
    public function create(Cursando $cursando) {

        //echo '<pre>' , var_dump($cursando) , '</pre>';

        try {

            $sql = 'INSERT INTO cursando (id_aluno, id_curso, modulo, periodo, situacao_matricula)
            VALUES (:id_aluno, :id_curso, :modulo, :periodo, :situacao_matricula);';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id_aluno', $cursando->getAluno(), PDO::PARAM_INT);
            $stmt->bindValue(':id_curso', $cursando->getCurso(), PDO::PARAM_INT);
            $stmt->bindValue(':modulo', $cursando->getModulo(), PDO::PARAM_INT);
            $stmt->bindValue(':periodo', $cursando->getPeriodo(), PDO::PARAM_STR);
            $stmt->bindValue(':situacao_matricula', $cursando->getSituacaoMatricula(), PDO::PARAM_INT);
            
            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao inserir cursando.<br>' . $e . '<br>';

        }

    }

    /* public function read($id) {

        try {

            $sql = 'SELECT id, codigo_cursando, nome, duracao
            FROM cursando INNER JOIN telefone_cursando telefone
            ON cursando.id = telefone.id_cursando
            WHERE cursando.id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {

                $cursando = new Cursando();

                $cursando->setId($data['id']);
                $cursando->setCodigoCursando($data['codigo_cursando']);
                $cursando->setNome($data['nome']);
                $cursando->setDuracao($data['duracao']);
                
                return $cursando;
            
            }
    
            return $data;

        } catch (Exception $e) {

            echo 'Erro ao selecionar cursando.<br>' . $e . '<br>';

        }

    }
     
    public function update(Cursando $cursando) {

        try {

            $sql = 'UPDATE cursando SET codigo_cursando = :codigo_cursando, nome = :nome, duracao = :duracao
            WHERE id = :id;';

            $stmt = Connection::getConnection()->prepare($sql);


            $stmt->bindValue(':codigo_cursando', $cursando->getCodigoCursando(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $cursando->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':duracao', $cursando->getDuracao(), PDO::PARAM_INT);

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar fazer atualizar cursando.<br>' . $e . '<br>';

        }

    } */

/*

    public function delete(Cursando $cursando) {

        try {

            $sql = 'DELETE FROM cursando WHERE id = :id';
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindValue(':id', $cursando->getId());

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar excluir cursando.<br>' . $e . '<br>';

        }

    }
    
*/
    
}

?>