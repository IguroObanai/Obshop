<?php

class ConexaoBD
{
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "aluno";
    private $banco = "loja";
    private $conexao;

    public function __construct()
    {
        $this->conectar();
    }

    private function conectar()
    {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_error) {
            die("Falha na conexão: " . $this->conexao->connect_error);
        }
    }

    public function getConexao()
    {
        return $this->conexao;
    }
}