<?php

require_once "modelo/dao/GenericDao.php";

class ClienteDao extends GenericDao
{

    public function salvar($cliente)
    {
        try {
            $this->conexao->beginTransaction();

            $nome = $cliente->getNome();
            $email = $cliente->getEmail();
            $nascimento = $cliente->getNascimento();
            $telefone = $cliente->getTelefone();

            $query = $this->conexao->prepare('INSERT INTO cliente(nome, email, nascimento, telefone) VALUES (:nome, :email, :nascimento, :telefone)');
            $query->bindParam(':nome', $nome);
            $query->bindParam(':email', $email);
            $query->bindParam(':nascimento', $nascimento);
            $query->bindParam(':telefone', $telefone);

            $query->execute();

            $this->conexao->commit();
        } catch (Exception $e) {
            $this->conexao->rollBack();
            throw $e;
        }
    }

    public function listar()
    {
        $query = $this->conexao->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente');
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes;
    }

    public function deletar($id)
    {
        try {
            $this->conexao->beginTransaction();

            $query = $this->conexao->prepare('DELETE FROM cliente WHERE id=:id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $this->conexao->commit();
        } catch (Exception $e) {
            $this->conexao->rollBack();
            throw $e;
        }
    }

    public function atualizar($cliente)
    {
        try {
            $this->conexao->beginTransaction();

            $nome = $cliente->getNome();
            $id = $cliente->getId();
            $nascimento = $cliente->getNascimento();
            $telefone = $cliente->getTelefone();
            $email = $cliente->getEmail();

            $query = $this->conexao->prepare('UPDATE cliente SET nome=:nome, nascimento=:nascimento, telefone=:telefone, email=:email WHERE id=:id');
            $query->bindParam(':nome', $nome);
            $query->bindParam(':nascimento', $nascimento);
            $query->bindParam(':telefone', $telefone);
            $query->bindParam(':email', $email);
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
        $query = $this->conexao->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente WHERE id=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes[0];
    }

    public function buscar($filtro)
    {
        $filtro = "%" . $filtro . "%";

        $query = $this->conexao->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente WHERE nome LIKE :filtro');
        $query->bindParam(':filtro', $filtro, PDO::PARAM_STR);
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes;
    }
}
