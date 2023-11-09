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
    }

    public function deletar($id)
    {
    }

    public function atualizar($aluno)
    {
    }
}
