<?php
class Authentication {

    private $cpf;
    private $senha;

    public function __construct() {
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    
    public function setSenha($senha) {
        $this->senha = $senha;
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
        die();
    }

}

?>