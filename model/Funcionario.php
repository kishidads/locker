<?php

final class Funcionario extends Pessoa {

    private $funcao;
    private $privilegio;

    public function __construct() {
        parent::__construct();
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