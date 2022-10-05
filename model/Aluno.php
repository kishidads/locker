<?php

final class Aluno extends Pessoa {

    private $rm;
    private $curso;

    public function __construct($cpf, $email, $senha, $nome, $sobrenome, $telefone, $rm) {
        parent::__construct($cpf, $email, $senha, $nome, $sobrenome, $telefone);
        $this->rm = $rm;
    }

    public function getRm() {
        return $this->rm;
    }
    
    public function setRm($rm) {
        $this->rm = $rm;
    }

    public function getCurso() {
        return $this->rm;
    }
    
    public function setCurso(Curso $curso) {
        $this->curso[] = $curso;
    }

}

?>