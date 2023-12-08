<?php

require_once "modelo/dao/GenericDao.php";

class ModeloDao extends GenericDao
{

    public function salvar($modelo)
    {
        $nome = $modelo->getNome();

        $query = $this->conexao->prepare('INSERT INTO modelo(nome) VALUES (:nome)');
        $query->bindParam(':nome', $nome);

        $query->execute();
    }


    public function listar()
    {
        $query = $this->conexao->prepare('SELECT id, nome FROM modelo');
        $query->execute();
        $modelos = $query->fetchAll(PDO::FETCH_CLASS);

        return $modelos;
    }

    public function deletar($id)
    {
        $query = $this->conexao->prepare('DELETE FROM modelo WHERE id=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function atualizar($modelo)
    {
        $nome = $modelo->getNome();
        $id = $modelo->getId();

        $query = $this->conexao->prepare('UPDATE modelo SET nome=:nome WHERE id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    public function get($id)
    {
        $query = $this->conexao->prepare('SELECT id, nome FROM modelo WHERE id=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $modelos = $query->fetchAll(PDO::FETCH_CLASS);

        return $modelos[0];
    }

    public function buscar($filtro)
    {
        $filtro = "%" . $filtro . "%";

        $query = $this->conexao->prepare('SELECT id, nome FROM modelo WHERE nome LIKE :filtro');
        $query->bindParam(':filtro', $filtro, PDO::PARAM_STR);
        $query->execute();
        $modelos = $query->fetchAll(PDO::FETCH_CLASS);

        return $modelos;
    }
}
