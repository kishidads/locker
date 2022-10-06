<?php

class Authentication {

    private $cpf;
    private $senha;

    private $user;

    public function __construct($cpf = null, $senha = null) {
        $this->cpf = $cpf;
        $this->senha = $senha;
    }

    public function getUser() {
        return $this->user;
    }
    
    public function setUser($user) {
        $this->user = $user;
    }

    private function checkCredentials() {
        $sql = 'SELECT * FROM aluno WHERE cpf = :cpf';
        $stmt = Connection::getConnection()->prepare($sql);
        $stmt->bindValue(':cpf', $this->cpf);

        if ($stmt->execute()) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user['senha'] == $this->senha) {
                return $user;
            }
        }
        return false;
    }

    public function login() {
        $user = $this->checkCredentials();
        if ($user) {
            session_start();
            $this->user = $user;
            $_SESSION['authenticate'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            return $user['id'];
        }
        return false;
    }

    public function logout() {
        session_start();
	    session_unset();
	    session_destroy();

	    header('Location: /');
    }

}

?>