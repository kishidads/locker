<?php

final class Funcionario extends Pessoa {

    private $funcao;
    private $privilegio;

    public function __construct($cpf, $email, $senha, $nome, $sobrenome, $funcao, $privilegio) {
        parent::__construct($cpf, $email, $senha, $nome, $sobrenome);
        $this->funcao = $funcao;
        $this->privilegio = $privilegio;
    }

    public function getFuncao() {
        return $this->funcao;
    }

    public function getPrivilegio() {
        return $this->privilegio;
    }

    public function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    public function setPrivilegio($privilegio) {
        $this->privilegio = $privilegio;
    }

}

?>