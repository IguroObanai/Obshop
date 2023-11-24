
<h3 style="margin:15px;">Categorias</h3>
<hr />
<div class="row" style="padding:15px;">
    <div class="col-5">
        <a class="btn btn-info" href="?page=categoriaControle"> <i class="bi bi-file"></i><br /> NOVO</a>
    </div>
    <div class="col-7">
        <form class="d-flex" role="search" method="post" action="?page=categoriaControle">            
            <input class="form-control me-2" type="search" placeholder="Pesquise pelo nome da categoria" aria-label="Search" name="buscar">
            <button class="btn btn-info" type="submit" value="btbuscar" name="acao"><i class="bi bi-search" ></i> Buscar</button>
        </form>
    </div>
</div>

<table class="table">
    <tr>
        <th>NOME</th>
        <th>DESCRIÇÃO</th>
        <th class="text-center">Editar</th>
        <th class="text-center">Excluir</th>
    </tr>

    <?php foreach ($categorias as $categoria) { ?>
        <tr>
            <td><?php echo $categoria->nome; ?></td>
            <td><?php echo $categoria->descricao; ?></td>
            <td class="text-center">
                <a href="?page=categoriaControle&acao=get&id=<?php echo $categoria->id; ?>" class="btn btn-warning">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
            <td class="text-center">
                <a href="?page=categoriaControle&acao=excluir&id=<?php echo $categoria->id; ?>" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
    <?php } ?>  
</table>