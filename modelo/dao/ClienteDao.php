<?php

require_once "modelo\dao\GenericDao.php";

class ClienteDao extends GenericDao
{

    public function salvar($cliente)
    {

        $nome = $cliente->getNome();
        $email = $cliente->getEmail();
        $nascimento = $cliente->getNascimento();
        $telefone = $cliente->getTelefone();

        $query = $this->conexao ->prepare('INSERT INTO cliente(nome, email, nascimento, telefone) VALUES (?, ?, ?, ?)');
        $query->bindParam('ssss', $nome, $email, $nascimento, $telefone);

        $query->execute();
    }

    public function listar()
    {

        $query = $this->conexao ->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente');
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes;
    }

    public function deletar($id)
    {

        $query = $this->conexao ->prepare('DELETE FROM cliente WHERE id=?');
        $query->bindParam('i', $id);
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
        $query->bindParam('ssssi', $nome, $nascimento, $telefone, $email, $id);
        $query->execute();
    }

    public function get($id)
    {

        $query = $this->conexao ->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente WHERE id=?');
        $query->bindParam('i', $id);
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes[0];
    }

    public function buscar($filtro)
    {

        $filtro = "%" . $filtro . "%";

        $query = $this->conexao ->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente WHERE nome LIKE ?');
        $query->bindParam('s', $filtro);
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes;
    }
}
