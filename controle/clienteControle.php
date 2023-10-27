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
    $cliente->setEmail($_POST['nome']);
    $cliente->setNascimento($_POST['nascimento']);

    $clienteDao->salvar($cliente);
} else if ($acao == "listar") {
    echo "listando...";
} else if ($acao == "alterar") {
    echo "alterando...";
} else if ($acao == "excluir") {
    echo "excluindo...";
}
