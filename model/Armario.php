<?php

class Armario {

    private $id;
    private $secao;
    private $numero;
    private $proximidade;
    private $andar;
    private $situacao;


    function __construct($secao, $numero, $proximidade, $andar, $situacao) {
        $this->secao = $secao;
        $this->numero = $numero;
        $this->proximidade = $proximidade;
        $this->andar = $andar;
        $this->situacao = $situacao;
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

    public function getProximidade() {
        return $this->proximidade;
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

    public function setProximidade($proximidade) {
        $this->proximidade = $proximidade;
    }

    public function seAndar($andar) {
        $this->andar = $andar;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

}

?>