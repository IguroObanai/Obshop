
<h3 style="margin:15px;">Produtos</h3>
<hr />
<div class="row" style="padding:15px;">
    <div class="col-5">
        <a class="btn btn-info" href="?page=produtoControle"> <i class="bi bi-file"></i><br /> NOVO</a>
    </div>
    <div class="col-7">
        <form class="d-flex" role="search" method="post" action="?page=produtoControle">            
            <input class="form-control me-2" type="search" placeholder="Pesquise pelo nome do produto" aria-label="Search" name="buscar">
            <button class="btn btn-info" type="submit" value="btbuscar" name="acao"><i class="bi bi-search" ></i> Buscar</button>
        </form>
    </div>
</div>


<table class="table">
    <tr>
        <th>NOME</th>
        <th>PREÇO</th>
        <th>TAMANHO</th>
        <th>COR</th>
        <th class="text-center">Editar</th>
        <th class="text-center">Excluir</th>
    </tr>

    <?php foreach ($produtos as $produto) { ?>
        <tr>
            <td><?php echo $produto->nome; ?></td>
            <td><?php echo $produto->preco; ?></td>
            <td><?php echo $produto->tamanho; ?></td>
            <td><?php echo $produto->cor; ?></td>
            <td class="text-center">
                <a href="?page=produtoControle&acao=get&id=<?php echo $produto->id; ?>" class="btn btn-warning">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
            <td class="text-center">
                <a href="?page=produtoControle&acao=excluir&id=<?php echo $produto->id; ?>" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
    <?php } ?>  
</table>