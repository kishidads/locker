<?php

final class Aluno extends Pessoa {

    private $rm;

    public function __construct($cpf, $email, $senha, $nome, $sobrenome, $telefone, $rm) {
        parent::__construct($cpf, $email, $senha, $nome, $sobrenome, $telefone);
        $this->rm = $rm;
    }

    public function getRm() {
        return $this->rm;
    }

    public function getModulo() {
        return $this->modulo;
    }

    public function getPeriodo() {
        return $this->periodo;
    }

    public function getSituacaoMatricula() {
        return $this->situacaoMatricula;
    }
    
    public function setRm($rm) {
        $this->rm = $rm;
    }

}

?>