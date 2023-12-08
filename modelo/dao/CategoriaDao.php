<?php

require_once "modelo/dao/GenericDao.php";

class CategoriaDao extends GenericDao
{

    public function salvar($categoria)
    {
        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();

        $query = $this->conexao->prepare('INSERT INTO categoria(nome, descricao) VALUES (:nome, :descricao)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':descricao', $descricao);

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
        $query = $this->conexao->prepare('DELETE FROM categoria WHERE id=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function atualizar($categoria)
    {
        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();
        $id = $categoria->getId();

        $query = $this->conexao->prepare('UPDATE categoria SET nome=:nome, descricao=:descricao WHERE id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':descricao', $descricao);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function get($id)
    {
        $query = $this->conexao->prepare('SELECT id, nome, descricao FROM categoria WHERE id=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_CLASS);

        return $categorias[0];
    }

    public function buscar($filtro)
    {
        $filtro = "%" . $filtro . "%";

        $query = $this->conexao->prepare('SELECT id, nome, descricao FROM categoria WHERE nome LIKE :filtro');
        $query->bindParam(':filtro', $filtro, PDO::PARAM_STR);
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_CLASS);

        return $categorias;
    }
}
