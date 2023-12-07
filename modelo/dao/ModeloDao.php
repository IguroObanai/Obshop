<?php

require_once "modelo\dao\GenericDao.php";


class modeloDao extends GenericDao
{

    public function salvar($modelo)
    {

        $nome = $modelo->getNome();
        

        $query = $this->conexao ->prepare('INSERT INTO modelo(nome) VALUES (:s)');
        $query->bindParam(':s', $nome);

        $query->execute();
    }


    public function listar()
    {

        $query = $this->conexao ->prepare('SELECT id, nome FROM modelo');
        $query->execute();
        $modelos = $query->fetchAll(PDO::FETCH_CLASS);

        return $modelos;
    }

    public function deletar($id)
    {

        $query = $this->conexao ->prepare('DELETE FROM modelo WHERE id=?');
        $query->bindParam('i', $id);
        $query->execute();
    }

    public function atualizar($modelo)
    {

        $nome = $modelo->getNome();
        $id = $modelo->getId();

        $query = $this->conexao ->prepare('UPDATE modelo SET nome=? WHERE id=?');
        $query->bindParam('si', $nome, $id);
        $query->execute();
    }

    public function get($id)
    {

        $query = $this->conexao ->prepare('SELECT id, nome FROM modelo WHERE id=?');
        $query->bindParam('i', $id);
        $query->execute();
        $modelos = $query->fetchAll(PDO::FETCH_CLASS);

        return $modelos[0];
    }

    public function buscar($filtro)
    {

        $filtro = "%" . $filtro . "%";

        $query = $this->conexao ->prepare('SELECT id, nome FROM modelo WHERE nome LIKE ?');
        $query->bindParam('s', $filtro);
        $query->execute();
        $modelos = $query->fetchAll(PDO::FETCH_CLASS);

        return $modelos;
    }
}
