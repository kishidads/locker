<?php

class CursoDAO {
    
    public function create(Curso $curso) {

        //echo '<pre>' , var_dump($curso) , '</pre>';

        try {

            $sql = 'INSERT INTO curso (codigo_curso, nome, duracao)
            VALUES (:codigo_curso, :nome, :duracao);';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':codigo_curso', $curso->getCodigoCurso(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $curso->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':duracao', $curso->getDuracao(), PDO::PARAM_INT);
            
            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao inserir curso.<br>' . $e . '<br>';

        }

    }

/*     public function read($id) {

        try {

            $sql = 'SELECT id, codigoCurso, nome, duracao
            FROM curso';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {

                $curso = new Curso();

                $curso->setCpf($data['cpf']);
                $curso->setEmail($data['email']);
                $curso->setSenha($data['senha']);
                $curso->setNome($data['nome']);
                $curso->setSobrenome($data['sobrenome']);
                $curso->setTelefone($data['telefone']);
                $curso->setRm($data['rm']);
                $curso->setId($data['id']);
                
                return $curso;
                    
            }
    
            return $data;

        } catch (Exception $e) {

            echo 'Erro ao selecionar curso.<br>' . $e . '<br>';

        }

    } */

    public function readAll() {

        try {

            $sql = 'SELECT id, codigo_curso, nome, duracao
            FROM curso
            ORDER BY nome, codigo_curso ASC';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $list = array();

            foreach ($data as $row) {

                $list[] = $this->list($row);

            }

            return $list;

        } catch (Exception $e) {

            echo 'Erro ao selecionar cursos.<br>' . $e . '<br>';

        }

    }

    private function list($row) {

        $curso = new Curso();

        $curso->setId($row['id']);
        $curso->setCodigoCurso($row['codigo_curso']);
        $curso->setNome($row['nome']);
        $curso->setDuracao($row['duracao']);

        return $curso;

    }

      
    public function update(Curso $curso) {

        try {

            $sql = 'UPDATE curso
            SET codigo_curso = :codigo_curso, nome = :nome, duracao = :duracao
            WHERE id = :id;';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':codigo_curso', $curso->getCodigoCurso(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $curso->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':duracao', $curso->getDuracao(), PDO::PARAM_INT);
            $stmt->bindValue(':id', $curso->getId(), PDO::PARAM_INT);

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar atualizar curso.<br>' . $e . '<br>';

        }

    }

    public function delete(Curso $curso) {

        try {

            $sql = 'DELETE FROM curso
            WHERE id = :id';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':id', $curso->getId());

            return $stmt->execute();

        } catch (Exception $e) {

            echo 'Erro ao tentar excluir curso.<br>' . $e . '<br>';

        }

    }
    
}

?>