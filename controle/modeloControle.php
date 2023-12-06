<!-- 
    git config --global user.name "Fulano de Tal"
    git config --global user.email fulanodetal@exemplo.br 

-->

<?php

require_once 'modelo/dominio/modelo.php';
require_once 'modelo/dao/ModeloDao.php';

$modeloDao = new ModeloDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formModelo.php';
} else if ($acao == "salvar") {

    $modelo = new modelo();
    $modelo->setNome($_POST['nome']);
    
    $modeloDao->salvar($modelo);

    header("Location: ?page=modeloControle&acao=listar");
} else if ($acao == "listar") {

    $modelos = $modeloDao->listar();
    include 'pages/listarmodelo.php';

} else if ($acao == "alterar") {

    $modelo = new modelo();
    $modelo->setId($_POST['id']);
    $modelo->setNome($_POST['nome']);

    $modeloDao->atualizar($modelo);

    header("Location: ?page=modeloControle&acao=listar");

} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $modeloDao->deletar($id);
    header("Location: ?page=modeloControle&acao=listar");
} else if ($acao == "get") {
    $id = $_GET['id'];

    $modelo = $modeloDao->get($id);
    include 'pages/formmodelo.php';

} else if ($acao == "btbuscar") {

    $nome = $_POST['buscar'];

    $modelos = $modeloDao->buscar($nome);
    include 'pages/listarmodelo.php';


}