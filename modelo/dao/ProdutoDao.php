<?php

require_once "modelo/dao/GenericDao.php";

class ProdutoDao extends GenericDao
{

    public function salvar($produto)
    {
        try {
            $this->conexao->beginTransaction();

            $nome = $produto->getNome();
            $preco = $produto->getPreco();
            $cor = $produto->getCor();
            $tamanho = $produto->getTamanho();
            $categoria_id = $produto->getCategoriaId();
            $modelo_id = $produto->getModelo();

            $query = $this->conexao->prepare('INSERT INTO produto(nome, preco, cor, tamanho, categoria_id, modelo_id) VALUES (:nome, :preco, :cor, :tamanho, :categoria_id, :modelo_id)');
            $query->bindParam(':nome', $nome);
            $query->bindParam(':preco', $preco);
            $query->bindParam(':cor', $cor);
            $query->bindParam(':tamanho', $tamanho);
            $query->bindParam(':categoria_id', $categoria_id);
            $query->bindParam(':modelo_id', $modelo_id);

            $query->execute();

            $this->conexao->commit();
        } catch (Exception $e) {
            $this->conexao->rollBack();
            throw $e;
        }
    }


    public function listar()
    {
        $query = $this->conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto');
        $query->execute();
        $produtos = $query->fetchAll(PDO::FETCH_CLASS);

        return $produtos;
    }

    public function deletar($id)
    {
        try {
            $this->conexao->beginTransaction();

            $query = $this->conexao->prepare('DELETE FROM produto WHERE id=:id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $this->conexao->commit();
        } catch (Exception $e) {
            $this->conexao->rollBack();
            throw $e;
        }
    }

    public function atualizar($produto)
    {
        try {
            $this->conexao->beginTransaction();

            $nome = $produto->getNome();
            $id = $produto->getId();
            $cor = $produto->getCor();
            $tamanho = $produto->getTamanho();
            $preco = $produto->getPreco();
            $modelo_id = $produto->getModelo();
            $categoria_id = $produto->getCategoriaId();

            $query = $this->conexao->prepare('UPDATE produto SET nome=:nome, cor=:cor, tamanho=:tamanho, preco=:preco, categoria_id=:categoria_id, modelo_id=:modelo_id WHERE id=:id');
            $query->bindParam(':nome', $nome);
            $query->bindParam(':cor', $cor);
            $query->bindParam(':tamanho', $tamanho);
            $query->bindParam(':preco', $preco);
            $query->bindParam(':categoria_id', $categoria_id);
            $query->bindParam(':modelo_id', $modelo_id);
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
        $query = $this->conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto WHERE id=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $produtos = $query->fetchAll(PDO::FETCH_CLASS);

        return $produtos[0];
    }

    public function buscar($filtro)
    {
        $filtro = "%" . $filtro . "%";

        $query = $this->conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto WHERE nome LIKE :filtro');
        $query->bindParam(':filtro', $filtro, PDO::PARAM_STR);
        $query->execute();
        $produtos = $query->fetchAll(PDO::FETCH_CLASS);

        return $produtos;
    }
}
