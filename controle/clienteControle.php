<!-- 
    git config --global user.name "Fulano de Tal"
    git config --global user.email fulanodetal@exemplo.br 
-->

<?php

require_once 'modelo/dominio/cliente.php';
require_once 'modelo/dao/ClienteDao.php';

$clienteDao = new ClienteDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/home.php';
} else if ($acao == "salvar") {

    $cliente = new Cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setNascimento($_POST['nascimento']);

    $clienteDao->salvar($cliente);

    header("Location: ?page=clienteControle&acao=listar");
} else if ($acao == "listar") {

    $clientes = $clienteDao->listar();
    include 'pages/listarCliente.php';

} else if ($acao == "alterar") {

    $cliente = new Cliente();
    $cliente->setId($_POST['id']);
    $cliente->setNome($_POST['nome']);
    $cliente->setNascimento($_POST['nascimento']);

    $clienteDao->atualizar($cliente);

    header("Location: ?page=clienteControle&acao=listar");

} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $clienteDao->deletar($id);
    header("Location: ?page=clienteControle&acao=listar");
} else if ($acao == "get") {
    $id = $_GET['id'];

    $cliente = $clienteDao->get($id);
    include 'pages/home.php';

} else if ($acao == "btbuscar") {

    $nome = $_POST['buscar'];

    $clientes = $clienteDao->buscar($nome);
    include 'pages/listarCliente.php';


}