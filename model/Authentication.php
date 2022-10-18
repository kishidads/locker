<?php
class Authentication {

    private $cpf;
    private $senha;

    public function __construct($cpf, $senha) {
        $this->cpf = $cpf;
        $this->senha = $senha;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    private function checkCredentials($user) {
        if ($user) {
            if ($user['senha'] == $this->senha) {
                return $user;
            }
        }
        return false;
    }

    public function login($data) {
        $user = $this->checkCredentials($data);
        if ($user) {
            session_start();
            $_SESSION['authenticate'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            return true;
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