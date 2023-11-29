<?php

class ClienteDao
{

    public function salvar($cliente)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $nome = $cliente->getNome();
        $email = $cliente->getEmail();
        $nascimento = $cliente->getNascimento();
        $telefone = $cliente->getTelefone();

        $query = $conexao->prepare('INSERT INTO cliente(nome, email, nascimento, telefone) VALUES (?, ?, ?, ?)');
        $query->bind_param('ssss', $nome, $email, $nascimento, $telefone);

        $query->execute();
    }

    public function listar()
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente');
        $query->execute();
        $result = $query->get_result();
        $clientes = $result->fetch_all(MYSQLI_ASSOC);

        return $clientes;
    }

    public function deletar($id)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('DELETE FROM cliente WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
    }

    public function atualizar($cliente)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $nome = $cliente->getNome();
        $id = $cliente->getId();
        $nascimento = $cliente->getNascimento();
        $telefone = $cliente->getTelefone();
        $email = $cliente->getEmail();

        $query = $conexao->prepare('UPDATE cliente SET nome=?, nascimento=?, telefone=?, email=? WHERE id=?');
        $query->bind_param('ssssi', $nome, $nascimento, $telefone, $email, $id);
        $query->execute();
    }

    public function get($id)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $query = $conexao->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();
        $clientes = $result->fetch_all(MYSQLI_ASSOC);

        return $clientes[0];
    }

    public function buscar($filtro)
    {
        require_once('C:\xampp\htdocs\Obshop\util\conectar.php');

        $conexaoBD = new ConexaoBD();
        $conexao = $conexaoBD->getConexao();

        $filtro = "%" . $filtro . "%";

        $query = $conexao->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente WHERE nome LIKE ?');
        $query->bind_param('s', $filtro);
        $query->execute();
        $result = $query->get_result();
        $clientes = $result->fetch_all(MYSQLI_ASSOC);

        return $clientes;
    }
}
