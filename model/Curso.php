<?php

class Curso {

    private $id;
    private $codigoCurso;
    private $nome;
    private $duracao;

    public function __construct($codigoCurso, $nome, $duracao) {
        $this->codigoCurso = $codigoCurso;
        $this->nome = $nome;
        $this->duracao = $duracao;
    }

    public function getId() {
        return $this->id;
    }

    public function getCodigoCurso() {
        return $this->codigoCurso;
    }
    
    public function getNome() {
        return $this->nome;
    }
    
    public function getDuracao() {
        return $this->duracao;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setCodigoCurso($codigoCurso) {
        $this->codigoCurso = $codigoCurso;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDuracao($duracao) {
        $this->duracao = $duracao;
    }

}

?>