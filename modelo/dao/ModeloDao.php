<?php

class modeloDao
{

    public function salvar($modelo)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $nome = $modelo->getNome();
        

        $query = $conexao->prepare('INSERT INTO modelo(nome) VALUES (?)');
        $query->bind_param('s', $nome);

        $query->execute();
    }


    public function listar()
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('SELECT id, nome FROM modelo');
        $query->execute();
        $result = $query->get_result();
        $modelos = $result->fetch_all(MYSQLI_ASSOC);

        return $modelos;
    }

    public function deletar($id)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('DELETE FROM modelo WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
    }

    public function atualizar($modelo)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $nome = $modelo->getNome();
        $id = $modelo->getId();

        $query = $conexao->prepare('UPDATE modelo SET nome=? WHERE id=?');
        $query->bind_param('si', $nome, $id);
        $query->execute();
    }

    public function get($id)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('SELECT id, nome FROM modelo WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();
        $modelos = $result->fetch_all(MYSQLI_ASSOC);

        return $modelos[0];
    }

    public function buscar($filtro)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $filtro = "%" . $filtro . "%";

        $query = $conexao->prepare('SELECT id, nome FROM modelo WHERE nome LIKE ?');
        $query->bind_param('s', $filtro);
        $query->execute();
        $result = $query->get_result();
        $modelos = $result->fetch_all(MYSQLI_ASSOC);

        return $modelos;
    }
}
