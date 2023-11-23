<!-- 
    git config --global user.name "Fulano de Tal"
    git config --global user.email fulanodetal@exemplo.br 
-->

<?php

require_once 'modelo/dominio/produto.php';
require_once 'modelo/dao/produtoDao.php';

require_once 'modelo/dominio/cliente.php';
require_once 'modelo/dao/ClienteDao.php';

$clienteDao = new ClienteDao();

$produtoDao = new ProdutoDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    $categorias = $clienteDao->listar();
    include 'pages/formProduto.php';
} else if ($acao == "salvar") {

    $produto = new Produto();
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setTamanho($_POST['tamanho']);
    $produto->setCor($_POST['cor']);

    $produtoDao->salvar($produto);

    header("Location: ?page=produtoControle&acao=listar");
} else if ($acao == "listar") {

    $produtos = $produtoDao->listar();
    include 'pages/listarProduto.php';

} else if ($acao == "alterar") {

    $produto = new Produto();
    $produto->setId($_POST['id']);
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setTamanho($_POST['tamanho']);
    $produto->setCor($_POST['cor']);

    $produtoDao->atualizar($produto);

    header("Location: ?page=produtoControle&acao=listar");

} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $produtoDao->deletar($id);
    header("Location: ?page=produtoControle&acao=listar");
} else if ($acao == "get") {
    $id = $_GET['id'];

    $produto = $produtoDao->get($id);
    include 'pages/formProduto.php';

} else if ($acao == "btbuscar") {

    $nome = $_POST['buscar'];

    $produtos = $produtoDao->buscar($nome);
    include 'pages/listarProduto.php';


}