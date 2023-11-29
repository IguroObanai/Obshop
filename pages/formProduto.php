<h1 class="h3 mb-3 fw-normal">CADASTRO DE PRODUTO</h1>
<form method="post" action="?page=produtoControle">
  <?php if (isset($produto)) { ?>
    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>" />
    <?php
    $nome = $produto['nome'];
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
    <label for="preco" class="col-sm-2 col-form-label">Preço:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="preco" name="preco">
    </div>
  </div>

  <div class="row mb-3">

    <label for="tamanho" class="col-sm-2 col-form-label">Tamanho:</label>
    <div class="col-sm-10">

      <input type="radio" id="tamanhoPP" name="tamanho" value="PP">
      <label for="tamanhoPP">PP</label>

      <input type="radio" id="tamanhoP" name="tamanho" value="P">
      <label for="tamanhoP">P</label><br>

      <input type="radio" id="tamanhoM" name="tamanho" value="M">
      <label for="tamanhoM">M</label>

      <input type="radio" id="tamanhoG" name="tamanho" value="G">
      <label for="tamanhoG">G</label><br>

      <input type="radio" id="tamanhoGG" name="tamanho" value="GG">
      <label for="tamanhoGG">GG</label>

      <input type="radio" id="tamanhoXG" name="tamanho" value="XG">
      <label for="tamanhoXG">XG</label>
    </div>
  </div>

  <div class="row mb-3">
    <label for="categoria_id" class="col-sm-2 col-form-label">Categoria:</label>
    <div class="col-sm-10">
      <select name="categoria_id" id="categoria_id" class="form-control">
        <?php foreach ($categorias as $categoria) { ?>
          <option value="<?php echo $categoria['id']; ?>">
            <?php echo $categoria['nome']; ?>
          </option>
        <?php } ?>
      </select>
    </div>
  </div>

  <div class="row mb-3">
    <label for="cor" class="col-sm-2 col-form-label">Cor:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="cor" name="cor">
    </div>
  </div>

  <button value="<?php echo $acao; ?>" name="acao" type="submit" class="btn btn-primary">Salvar</button>
</form>