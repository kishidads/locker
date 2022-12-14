<?php

class AuthenticationDAO {

    public function authenticate($email) {

        try {

            $sql = 'SELECT id, email, senha, nome
            FROM aluno
            WHERE email = :email';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':email', $email);
            
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $data;

        } catch (Exception $e) {

            echo 'Erro ao selecionar aluno.<br>' . $e . '<br>';

        }

    }

}

?>