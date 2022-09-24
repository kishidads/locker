<?php

abstract class Pessoa {

    private $id;
    private $cpf;
    private $email;
    private $senha;
    private $nome;
    private $sobrenome;
    private $telefone;

    protected function __construct($cpf, $email, $senha, $nome, $sobrenome, $telefone) {
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->telefone = $telefone;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getCpf() {
        return $this->cpf;
    }
        
    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

}

?>