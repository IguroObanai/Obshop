<?php

require_once "util\conectar.php";


class modeloDao extends Conectar
{

    public function salvar($modelo)
    {

        $nome = $modelo->getNome();
        

        $query = $this->conexao ->prepare('INSERT INTO modelo(nome) VALUES (?)');
        $query->bind_param('s', $nome);

        $query->execute();
    }


    public function listar()
    {

        $query = $this->conexao ->prepare('SELECT id, nome FROM modelo');
        $query->execute();
        $result = $query->get_result();
        $modelos = $query->fetchAll(PDO::FETCH_CLASS);

        return $modelos;
    }

    public function deletar($id)
    {

        $query = $this->conexao ->prepare('DELETE FROM modelo WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
    }

    public function atualizar($modelo)
    {

        $nome = $modelo->getNome();
        $id = $modelo->getId();

        $query = $this->conexao ->prepare('UPDATE modelo SET nome=? WHERE id=?');
        $query->bind_param('si', $nome, $id);
        $query->execute();
    }

    public function get($id)
    {

        $query = $this->conexao ->prepare('SELECT id, nome FROM modelo WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();
        $modelos = $query->fetchAll(PDO::FETCH_CLASS);

        return $modelos[0];
    }

    public function buscar($filtro)
    {

        $filtro = "%" . $filtro . "%";

        $query = $this->conexao ->prepare('SELECT id, nome FROM modelo WHERE nome LIKE ?');
        $query->bind_param('s', $filtro);
        $query->execute();
        $result = $query->get_result();
        $modelos = $query->fetchAll(PDO::FETCH_CLASS);

        return $modelos;
    }
}
