<?php

require_once "util\conectar.php";

class ProdutoDao extends Conectar
{

    public function salvar($produto)
    {

        $nome = $produto->getNome();
        $preco = $produto->getPreco();
        $cor = $produto->getCor();
        $tamanho = $produto->getTamanho();
        $categoria_id = $produto->getCategoriaId();
        $modelo_id = $produto->getModelo();

        // Verifique se $modelo_id é nulo e atribua um valor padrão se for
        $modelo_id = ($modelo_id !== null) ? $modelo_id : 0; // Substitua 0 pelo valor padrão desejado

        $query = $this->conexao->prepare('INSERT INTO produto(nome, preco, cor, tamanho, categoria_id, modelo_id) VALUES (?, ?, ?, ?, ?, ?)');
        $query->bind_param('ssssii', $nome, $preco, $cor, $tamanho, $categoria_id, $modelo_id);

        $query->execute();
    }


    public function listar()
    {

        $query = $this->conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto');
        $query->execute();
        $result = $query->get_result();
        $produtos = $query->fetchAll(PDO::FETCH_CLASS);

        return $produtos;
    }

    public function deletar($id)
    {

        $query = $this->conexao->prepare('DELETE FROM produto WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
    }

    public function atualizar($produto)
    {

        $nome = $produto->getNome();
        $id = $produto->getId();
        $cor = $produto->getCor();
        $tamanho = $produto->getTamanho();
        $preco = $produto->getPreco();

        $query = $this->conexao->prepare('UPDATE produto SET nome=?, cor=?, tamanho=?, preco=? WHERE id=?');
        $query->bind_param('ssssi', $nome, $cor, $tamanho, $preco, $id);
        $query->execute();
    }

    public function get($id)
    {

        $query = $this->conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();
        $produtos = $query->fetchAll(PDO::FETCH_CLASS);

        return $produtos[0];
    }

    public function buscar($filtro)
    {

        $filtro = "%" . $filtro . "%";

        $query = $this->conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto WHERE nome LIKE ?');
        $query->bind_param('s', $filtro);
        $query->execute();
        $result = $query->get_result();
        $produtos = $query->fetchAll(PDO::FETCH_CLASS);

        return $produtos;
    }
}
