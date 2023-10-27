<?php

class Cliente{
    private $nome;
    private $telefone;
    private $email;
    private $cpf;

    public function setEmail($email){
        $this->email = $email;
    }
        
    public function getEmail(){
        return $this->email;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
        
    public function getTelefone(){
        return $this->telefone;
    }
    
    public function setNascimento($nascimento){
        $this->nascimento = $nascimento;
    }
    
    public function getNascimento(){
        return $this-> nascimento;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
}