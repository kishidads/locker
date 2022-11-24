<?php

class AdmAuthenticationDAO {

    public function authenticate($email) {

        try {

            $sql = 'SELECT id, email, senha, nome, privilegio
            FROM funcionario
            WHERE email = :email';

            $stmt = Connection::getConnection()->prepare($sql);

            $stmt->bindValue(':email', $email);
            
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $data;

        } catch (Exception $e) {

            echo 'Erro ao selecionar funcinário.<br>' . $e . '<br>';

        }

    }

}

?>