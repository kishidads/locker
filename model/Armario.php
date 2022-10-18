<?php

class Armario {

    private $id;
    private $secao;
    private $numero;
    private $local;
    private $andar;
    private $situacao;

    function __construct() {
    }

    public function getId() {
        return $this->id;
    }

    public function getSecao() {
        return $this->secao;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getLocal() {
        return $this->local;
    }

    public function getAndar() {
        return $this->andar;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSecao($secao) {
        $this->secao = $secao;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

    public function setAndar($andar) {
        $this->andar = $andar;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

}

?>