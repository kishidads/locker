<?php
class AdmAuthentication {

    private $email;
    private $senha;

    public function __construct() {
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    private function checkCredentials($user) {

        if ($user) {
            if ($user['senha'] === $this->senha) {
                return $user;
            }
        }
        return false;
    }

    public function login($data) {

        $user = $this->checkCredentials($data);

        if ($user) {

            session_start();

            $_SESSION['admAuthenticate'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['privilegio'] = $user['privilegio'];

            return true;

        }

        return false;

    }

    public function logout() {

        session_start();
	    session_unset();
	    session_destroy();

	    header('Location: /adm/login');
        die();

    }

}

?>