<?php

require_once 'util/Conectar.php';

class GenericDao{

    public $conexao;

    public function __construct(){
        $this->conexao = Conectar::getConexao();
    }

}