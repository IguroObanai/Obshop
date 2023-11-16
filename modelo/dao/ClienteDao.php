<?php

class ClienteDao
{

    public function salvar($cliente)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $nome = $cliente->getNome();
        $email = $cliente->getEmail();
        $nascimento = $cliente->getNascimento();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO cliente(nome, email,  nascimento) VALUES (:nome, :email, :nascimento)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':email', $email);
        $query->bindParam(':nascimento', $nascimento);


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

        $query = $conexao->prepare('SELECT id, nome, nascimento FROM cliente');
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes;

    }

    public function deletar($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('delete from cliente where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($cliente)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $nome = $cliente->getNome();
        $id = $cliente->getId();
        $nascimento = $cliente->getNascimento();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update cliente set nome=:nome, nascimento=:nascimento where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->bindParam(':nascimento', $nascimento);
        $query->execute();

    }

    public function get($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, nascimento FROM cliente WHERE id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes[0];
    }
}
