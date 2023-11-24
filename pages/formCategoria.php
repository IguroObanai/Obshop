<h1 class="h3 mb-3 fw-normal">CADASTRO DE CATEGORIA</h1>
<form method="post" action="?page=categoriaControle">
  <?php if (isset($categoria)) {
    ?>
    <input type="hidden" name="id" value="<?php echo $categoria->id; ?>" />
    <?php
    $nome = $categoria->nome;
    $acao = "alterar";
  } else {
    $nome = '';
    $acao = "salvar";
  }
  ?>

  <div class="row mb-3">
    <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>">
    </div>
  </div>

  <div class="row mb-3">
    <label for="descricao" class="col-sm-2 col-form-label">Descrição:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="descricao" name="descricao">
    </div>
  </div>

  <button value="<?php echo $acao; ?>" name="acao" type="submit" class="btn btn-primary">Salvar</button>
</form>