<?php

final class Aluno extends Pessoa {

    private $rm;
    private $modulo;
    private $periodo;
    private $situacaoMatricula;

    public function __construct($cpf, $email, $senha, $nome, $sobrenome, $rm) {
        parent::__construct($cpf, $email, $senha, $nome, $sobrenome);
        $this->rm = $rm;
        $this->setModulo();
        $this->setPeriodo();
        $this->setSituacaoMatricula();
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
    
    public function setModulo() {
        $this->modulo = 5;
    }
    
    public function setPeriodo() {
        $this->periodo = 'Noturno';
    }
    
    public function setSituacaoMatricula() {
        $this->situacaoMatricula = 'Ativa';
    }

}

?>