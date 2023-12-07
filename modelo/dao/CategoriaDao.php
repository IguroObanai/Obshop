<?php

require_once "modelo\dao\GenericDao.php";

class CategoriaDao extends GenericDao
{

    public function salvar($categoria)
    {

        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();

        $query = $this->conexao->prepare('INSERT INTO Categoria(Nome, Descricao) VALUES (?, ?)');
        $query->bindParam('ss', $nome, $descricao);

        $query->execute();
    }

    public function listar()
    {

        $query = $this->conexao->prepare('SELECT id, nome, descricao FROM categoria');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_CLASS);

        return $categorias;
    }

    public function deletar($id)
    {

        $query = $this->conexao->prepare('DELETE FROM categoria WHERE id=?');
        $query->bindParam('i', $id);
        $query->execute();
    }

    public function atualizar($categoria)
    {

        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();
        $id = $categoria->getId();

        $query = $this->conexao->prepare('UPDATE categoria SET nome=?, descricao=? WHERE id=?');
        $query->bindParam('ssi', $nome, $descricao, $id);
        $query->execute();
    }

    public function get($id)
    {

        $query = $this->conexao->prepare('SELECT id, nome, descricao FROM categoria WHERE id=?');
        $query->bindParam('i', $id);
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_CLASS);

        return $categorias[0];
    }

    public function buscar($filtro)
    {

        $filtro = "%" . $filtro . "%";

        $query = $this->conexao->prepare('SELECT id, nome, descricao FROM categoria WHERE nome LIKE ?');
        $query->bindParam('s', $filtro);
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_CLASS);

        return $categorias;
    }
}
