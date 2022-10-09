<?php

class AuthenticationDAO {

    public function authenticate($cpf) {

        try {

            $sql = 'SELECT id, cpf, senha, nome
            FROM aluno
            WHERE cpf = :cpf';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':cpf', $cpf);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $data;

        } catch (Exception $e) {

            echo 'Erro ao selecionar aluno.<br>' . $e . '<br>';

        }

    }

}

?>