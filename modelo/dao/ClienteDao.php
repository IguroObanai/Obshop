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
        $telefone = $cliente->getTelefone();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO cliente(nome, email, nascimento, telefone) VALUES (:nome, :email, :nascimento, :telefone)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':email', $email);
        $query->bindParam(':nascimento', $nascimento);
        $query->bindParam(':telefone', $telefone);

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

        $query = $conexao->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente');
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
        $telefone = $cliente->getTelefone();
        $email = $cliente->getEmail();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update cliente set nome=:nome, nascimento=:nascimento, telefone=:telefone, email=:email where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->bindParam(':nascimento', $nascimento);
        $query->bindParam(':telefone', $telefone);
        $query->bindParam(':email', $email);
        $query->execute();

    }

    public function get($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente WHERE id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);

        return $clientes[0];
    }

    public function buscar($filtro)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";
        $filtro = "%".$filtro."%";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, nascimento, telefone, email FROM cliente WHERE nome like :filtro');
        $query->bindParam(':filtro', $filtro);
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_CLASS);
        return $clientes;
    }
}
