<?php

class CategoriaDao
{

    public function salvar($categoria)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();

        $query = $conexao->prepare('INSERT INTO Categoria(Nome, Descricao) VALUES (?, ?)');
        $query->bind_param('ss', $nome, $descricao);

        $query->execute();
    }

    public function listar()
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('SELECT id, nome, descricao FROM categoria');
        $query->execute();
        $categorias = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        return $categorias;
    }

    public function deletar($id)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('DELETE FROM categoria WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
    }

    public function atualizar($categoria)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $nome = $categoria->getNome();
        $descricao = $categoria->getDescricao();
        $id = $categoria->getId();

        $query = $conexao->prepare('UPDATE categoria SET nome=?, descricao=? WHERE id=?');
        $query->bind_param('ssi', $nome, $descricao, $id);
        $query->execute();
    }

    public function get($id)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('SELECT id, nome, descricao FROM categoria WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
        $categorias = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        return $categorias[0];
    }

    public function buscar($filtro)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $filtro = "%" . $filtro . "%";

        $query = $conexao->prepare('SELECT id, nome, descricao FROM categoria WHERE nome LIKE ?');
        $query->bind_param('s', $filtro);
        $query->execute();
        $categorias = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        return $categorias;
    }
}
