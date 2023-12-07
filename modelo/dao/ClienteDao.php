<?php

require_once "util\conectar.php";

class ClienteDao extends Conectar
{

    public function salvar($cliente)
    {

        $nome = $cliente->getNome();
        $email = $cliente->getEmail();
        $nascimento = $cliente->getNascimento();
        $telefone = $cliente->getTelefone();

        $query = $this->conexao ->prepare('INSERT INTO cliente(nome, email, nascimento, telefone) VALUES (?, ?, ?, ?)');
        $query->bind_param('ssss', $nome, $email, $nascimento, $telefone);

        $query->execute();
    }

    public function listar()
    {

        $query = $this->conexao ->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente');
        $query->execute();
        $result = $query->get_result();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes;
    }

    public function deletar($id)
    {

        $query = $this->conexao ->prepare('DELETE FROM cliente WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
    }

    public function atualizar($cliente)
    {

        $nome = $cliente->getNome();
        $id = $cliente->getId();
        $nascimento = $cliente->getNascimento();
        $telefone = $cliente->getTelefone();
        $email = $cliente->getEmail();

        $query = $this->conexao ->prepare('UPDATE cliente SET nome=?, nascimento=?, telefone=?, email=? WHERE id=?');
        $query->bind_param('ssssi', $nome, $nascimento, $telefone, $email, $id);
        $query->execute();
    }

    public function get($id)
    {

        $query = $this->conexao ->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente WHERE id=?');
        $query->bind_param('i', $id);
        $query->execute();
        $result = $query->get_result();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes[0];
    }

    public function buscar($filtro)
    {

        $filtro = "%" . $filtro . "%";

        $query = $this->conexao ->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente WHERE nome LIKE ?');
        $query->bind_param('s', $filtro);
        $query->execute();
        $result = $query->get_result();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes;
    }
}
