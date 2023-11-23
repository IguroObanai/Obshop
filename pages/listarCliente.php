
<h3 style="margin:15px;">Clientes</h3>
<hr />
<div class="row" style="padding:15px;">
    <div class="col-5">
        <a class="btn btn-info" href="?page=clienteControle"> <i class="bi bi-file"></i><br /> NOVO</a>
    </div>
    <div class="col-7">
        <form class="d-flex" role="search" method="post" action="?page=clienteControle">            
            <input class="form-control me-2" type="search" placeholder="Pesquise pelo nome do cliente" aria-label="Search" name="buscar">
            <button class="btn btn-info" type="submit" value="btbuscar" name="acao"><i class="bi bi-search" ></i> Buscar</button>
        </form>
    </div>
</div>


<table class="table">
    <tr>
        <th>NOME</th>
        <th>NASCIMENTO</th>
        <th>TELEFONE</th>
        <th>EMAIL</th>
        <th class="text-center">Editar</th>
        <th class="text-center">Excluir</th>
    </tr>

    <?php foreach ($clientes as $cliente) { ?>
        <tr>
            <td><?php echo $cliente->nome; ?></td>
            <td><?php echo date('d/m/Y', strtotime($cliente->nascimento)); ?></td>
            <td><?php echo $cliente->telefone; ?></td>
            <td><?php echo $cliente->email; ?></td>
            <td class="text-center">
                <a href="?page=clienteControle&acao=get&id=<?php echo $cliente->id; ?>" class="btn btn-warning">
                    <i class="bi bi-pencil"></i>
                </a>
            </td>
            <td class="text-center">
                <a href="?page=clienteControle&acao=excluir&id=<?php echo $cliente->id; ?>" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
    <?php } ?>  
</table>