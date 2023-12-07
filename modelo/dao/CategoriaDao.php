<?php

require_once "util\conectar.php";

class CategoriaDao extends Conectar
{

    public function salvar($categoria)
    {

        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();

        $query = $this->conexao ->prepare('INSERT INTO Categoria(Nome, Descricao) VALUES (?, ?)');
        $query->bind_param('ss', $nome, $descricao);

        $query->execute();
    }

    public function listar()
    {

        $query = $this->conexao ->prepare('SELECT id, nome, descricao FROM categoria');
        $query->execute();
        $categorias = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        return $categorias;
    }

    public function deletar($id)
    {

        $query = $this->conexao ->prepare('DELETE FROM categoria WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
    }

    public function atualizar($categoria)
    {

        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();
        $id = $categoria->getId();

        $query = $this->conexao ->prepare('UPDATE categoria SET nome=?, descricao=? WHERE id=?');
        $query->bind_param('ssi', $nome, $descricao, $id);
        $query->execute();
    }

    public function get($id)
    {

        $query = $this->conexao ->prepare('SELECT id, nome, descricao FROM categoria WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
        $categorias = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        return $categorias[0];
    }

    public function buscar($filtro)
    {

        $filtro = "%" . $filtro . "%";

        $query = $this->conexao ->prepare('SELECT id, nome, descricao FROM categoria WHERE nome LIKE ?');
        $query->bind_param('s', $filtro);
        $query->execute();
        $categorias = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        return $categorias;
    }
}
