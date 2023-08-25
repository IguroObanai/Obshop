<?php

class Produto{
    private $nome;

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome(){
            return $this->nome;
        }

    private $preço;

        public function setPreco($preco){
            $this->preco = $preco;
        }

        public function getPreco(){
            return $this->preco;
        }

    private $tamanho;

        public function setTamanho($Tamanho){
            $this->tamanho = $tamanho;
        }
        
        public function get(){
            return $this->Tamanho;
        }

    private $cor;

        public function setCor($cor){
            $this->cor = $cor;
        }
        
        public function getCor(){
            return $this->cor;
        }

    private $modelo;

        public function setModelo($modelo){
            $this->modelo = $modelo;
        }
        
        public function getModelo(){
            return $this-> modelo;
        }
    
}