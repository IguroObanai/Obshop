<!-- 
    git config --global user.name "Fulano de Tal"
    git config --global user.email fulanodetal@gmail.com 
-->

<?php

require_once 'modelo/dominio/categoria.php';
require_once 'modelo/dao/categoriaDao.php';

$categoriaDao = new CategoriaDao();

$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : NULL;

if ($acao == NULL) {
    include 'pages/formcategoria.php';
} else if ($acao == "salvar") {

    $categoria = new categoria();
    $categoria->setNome($_POST['nome']);
    $categoria->setDescricao($_POST['descricao']);
    $categoriaDao->salvar($categoria);

    header("Location: ?page=categoriaControle&acao=listar");
} else if ($acao == "listar") {

    $categorias = $categoriaDao->listar();
    include 'pages/listarcategoria.php';

} else if ($acao == "alterar") {

    $categoria = new categoria();
    $categoria->setId($_POST['id']);
    $categoria->setNome($_POST['nome']);

    $categoriaDao->atualizar($categoria);

    header("Location: ?page=categoriaControle&acao=listar");

} else if ($acao == "excluir") {
    $id = $_GET['id'];
    $categoriaDao->deletar($id);
    header("Location: ?page=categoriaControle&acao=listar");
} else if ($acao == "get") {
    $id = $_GET['id'];

    $categoria = $categoriaDao->get($id);
    include 'pages/formCategoria.php';

} else if ($acao == "btbuscar") {

    $nome = $_POST['buscar'];

    $categorias = $categoriaDao->buscar($nome);
    include 'pages/listarCategoria.php';


}