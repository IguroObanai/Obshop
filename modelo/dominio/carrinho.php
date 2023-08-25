<?php

class Carrinho{
    private $cliente;

        public function setCliente($cliente){
            $this->cliente = $cliente;
        }
        
        public function getCliente(){
            return $this->cliente;
        }

    private $data;

        public function setData($data){
            $this->data = $data;
        }
        
        public function getdata(){
            return $this->data;
        }

    private $id;
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getId(){
            return $this->id;
        }
}