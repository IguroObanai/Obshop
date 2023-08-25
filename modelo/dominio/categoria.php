<?php

class Categoria{
    private $nome;
    private $descrição;

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome(){
            return $this->nome;
        }

   
        
        public function setDescriçao($descrição){
                $this->descricao = $descrição;
            }
            
            public function getDescricao(){
                return $this->descricao;
            }
}