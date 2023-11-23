<?php

class ProdutoDao
{

    public function salvar($produto)
    {
        //  try {

        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $nome = $produto->getNome();
        $preco = $produto->getPreco();
        $cor = $produto->getCor();
        $tamanho = $produto->getTamanho();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('INSERT INTO produto(nome, preco, cor, tamanho) VALUES (:nome, :preco, :cor, :tamanho)');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':preco', $preco);
        $query->bindParam(':cor', $cor);
        $query->bindParam(':tamanho', $tamanho);

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

        $query = $conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto');
        $query->execute();
        $produtos = $query->fetchAll(PDO::FETCH_CLASS);

        return $produtos;

    }

    public function deletar($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('delete from produto where id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function atualizar($produto)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $nome = $produto->getNome();
        $id = $produto->getId();
        $cor = $produto->getCor();
        $tamanho = $produto->getTamanho();
        $preco = $produto->getPreco();

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
        $query = $conexao->prepare('update produto set nome=:nome, cor=:cor, tamanho=:tamanho, preco=:preco where id=:id');
        $query->bindParam(':nome', $nome);
        $query->bindParam(':id', $id);
        $query->bindParam(':cor', $cor);
        $query->bindParam(':tamanho', $tamanho);
        $query->bindParam(':preco', $preco);
        $query->execute();

    }

    public function get($id)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto WHERE id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
        $produtos = $query->fetchAll(PDO::FETCH_CLASS);

        return $produtos[0];
    }

    public function buscar($filtro)
    {
        $host = "localhost";
        $usuario = "root";
        $senha = "aluno";
        $bd = "loja";
        $filtro = "%".$filtro."%";

        $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);

        $query = $conexao->prepare('SELECT id, nome, cor, tamanho, preco FROM produto WHERE nome like :filtro');
        $query->bindParam(':filtro', $filtro);
        $query->execute();
        $produtos = $query->fetchAll(PDO::FETCH_CLASS);
        return $produtos;
    }
}
