<?php

class Cliente{
    private $nome;

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome(){
            return $this->nome;
        }

    private $email;

        public function setEmail($email){
            $this->email = $email;
        }
        
        public function getEmail(){
            return $this->email;
        }
    private $telefone;

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }
        
        public function getTelefone(){
            return $this->telefone;
        }
    private $cpf;
        
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
        
        public function getCpf(){
            return $this-> cpf;
        }
}