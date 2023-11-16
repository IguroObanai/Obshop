<h1 class="h3 mb-3 fw-normal">CADASTRO DE CLIENTE</h1>
<form method="post" action="?page=clienteControle">
  <?php if ($cliente != null) {
    ?>
    <input type="hidden" name="id" value="<?php echo $cliente->id; ?>" />
    <?php
    $nome = $cliente->nome;
    $acao = "alterar";
  } else {
    $nome = '';
    $acao = "salvar";
  }
  ?>

  <div class="row mb-3">
    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="nascimento" class="col-sm-2 col-form-label">Data de Nascimento</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="nascimento" name="nascimento">
    </div>
  </div>

  <button value="<?php echo $acao; ?>" name="acao" type="submit" class="btn btn-primary">Salvar</button>
</form>