<?php

class CategoriaDao
{

    public function salvar($categoria)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $nome = $categoria->getNome();
        
        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO categoria(nome) VALUES (:nome)');
        $query->bindParam(':nome', $nome);

        $query->execute();

        //    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //  $conexao->exec('SET NAMES "utf8"');

        // } catch (Exception $e) {
        //    print $e->getMessage();
        //  exit();
        // }
    }

    public function listar()
    {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome FROM categoria');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_CLASS);

        return $categorias;

    }

    public function deletar($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('delete from categoria where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($categoria)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $nome = $categoria->getNome();
        $id = $categoria->getId();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update categoria set nome=:nome where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->execute();

    }

    public function get($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome FROM categoria WHERE id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_CLASS);

        return $categorias[0];
    }

    public function buscar($filtro)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";
        $filtro = "%".$filtro."%";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome FROM categoria WHERE nome like :filtro');
        $query->bindParam(':filtro', $filtro);
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_CLASS);
        return $categorias;
    }
}
