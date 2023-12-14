<?php

require_once "modelo/dao/GenericDao.php";

class CategoriaDao extends GenericDao
{

    public function salvar($categoria)
    {
        try {
            $this->conexao->beginTransaction();

            $nome = $categoria->getNome();
            $descricao = $categoria->getDescricao();

            $query = $this->conexao->prepare('INSERT INTO categoria(nome, descricao) VALUES (:nome, :descricao)');
            $query->bindParam(':nome', $nome);
            $query->bindParam(':descricao', $descricao);

            $query->execute();

            $this->conexao->commit();
        } catch (Exception $e) {
            $this->conexao->rollBack();
            throw $e;
        }
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
        try {
            $this->conexao->beginTransaction();

            $query = $this->conexao->prepare('DELETE FROM categoria WHERE id=:id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $this->conexao->commit();
        } catch (Exception $e) {
            $this->conexao->rollBack();
            throw $e;
        }
    }

    public function atualizar($categoria)
    {
        try {
            $this->conexao->beginTransaction();

            $nome = $categoria->getNome();
            $descricao = $categoria->getDescricao();
            $id = $categoria->getId();

            $query = $this->conexao->prepare('UPDATE categoria SET nome=:nome, descricao=:descricao WHERE id=:id');
            $query->bindParam(':nome', $nome);
            $query->bindParam(':descricao', $descricao);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $this->conexao->commit();
        } catch (Exception $e) {
            $this->conexao->rollBack();
            throw $e;
        }
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
