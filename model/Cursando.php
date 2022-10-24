<?php

class Cursando {

    private $id;
    private $modulo;
    private $periodo;
    private $situacaoMatricula;

    private $aluno;
    private $curso;

    public function __construct() {
    }

    public function getId() {
        return $this->id;
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

    public function getAluno() {
        return $this->aluno;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setModulo($modulo) {
        $this->modulo = $modulo;
    }

    public function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    public function setSituacaoMatricula($situacaoMatricula) {
        $this->nomsituacaoMatriculae = $situacaoMatricula;
    }

    public function setAluno($aluno) {
        $this->aluno[] = $aluno;
    }

    public function setCurso($curso) {
        $this->curso[] = $curso;
    }

}

?>