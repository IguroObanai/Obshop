<?php

class Vendedor{
    private $nome;

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome(){
            return $this->nome;
        }

    private $cpf;
        
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
        
        public function getCpf(){
            return $this-> cpf;
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
    private $cod_vendedor;

        public function setcodId($cod_vendedor){
            $this->codVendedor = $cod_vendedor;
        }
        
        public function get(){
            return $this->codVendedor;
        }
}