<?php

class Categoria
{
    private $nome;
    private $descricao;

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    private $id;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDescriçao($descrição)
    {
        $this->descricao = $descrição;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
}