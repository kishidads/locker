<?php

class Aluguel {

    private $id;
    private $data;
    private $situacao;
    
    private $idAluno;
    private $idArmario;
    private $idPlano;

    function __construct() {
    }

    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getIdAluno() {
        return $this->idAluno;
    }

    public function getIdArmario() {
        return $this->idArmario;
    }

    public function getIdPlano() {
        return $this->idPlano;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setData($data) {
        $this->data = $data;
    }
    
    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
    }

    public function setIdArmario($idArmario) {
        $this->idArmario = $idArmario;
    }

    public function setIdPlano($idPlano) {
        $this->idPlano = $idPlano;
    }

}

?>