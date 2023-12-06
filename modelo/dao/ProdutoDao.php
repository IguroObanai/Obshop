<?php

class ProdutoDao
{

    public function salvar($produto)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $nome = $produto->getNome();
        $preco = $produto->getPreco();
        $cor = $produto->getCor();
        $tamanho = $produto->getTamanho();
        $categoria_id = $produto->getCategoriaId();
        $modelo_id = $produto->getModelo();

        // Verifique se $modelo_id é nulo e atribua um valor padrão se for
        $modelo_id = ($modelo_id !== null) ? $modelo_id : 0; // Substitua 0 pelo valor padrão desejado

        $query = $conexao->prepare('INSERT INTO produto(nome, preco, cor, tamanho, categoria_id, modelo_id) VALUES (?, ?, ?, ?, ?, ?)');
        $query->bind_param('ssssii', $nome, $preco, $cor, $tamanho, $categoria_id, $modelo_id);

        $query->execute();
    }


    public function listar()
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto');
        $query->execute();
        $result = $query->get_result();
        $produtos = $result->fetch_all(MYSQLI_ASSOC);

        return $produtos;
    }

    public function deletar($id)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('DELETE FROM produto WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
    }

    public function atualizar($produto)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $nome = $produto->getNome();
        $id = $produto->getId();
        $cor = $produto->getCor();
        $tamanho = $produto->getTamanho();
        $preco = $produto->getPreco();

        $query = $conexao->prepare('UPDATE produto SET nome=?, cor=?, tamanho=?, preco=? WHERE id=?');
        $query->bind_param('ssssi', $nome, $cor, $tamanho, $preco, $id);
        $query->execute();
    }

    public function get($id)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();
        $produtos = $result->fetch_all(MYSQLI_ASSOC);

        return $produtos[0];
    }

    public function buscar($filtro)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $filtro = "%" . $filtro . "%";

        $query = $conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto WHERE nome LIKE ?');
        $query->bind_param('s', $filtro);
        $query->execute();
        $result = $query->get_result();
        $produtos = $result->fetch_all(MYSQLI_ASSOC);

        return $produtos;
    }
}
