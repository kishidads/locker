<?php

class Funcionario {

    private $funcao;
    private $privilegio;

    public function __construct($funcao, $privilegio) {
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