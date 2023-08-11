<?php

$listaProdutos = select ('produtos');

?>

 <div class="search-container">
 <div class="search-wrapper">
    <input type="text" id="searchInput"  placeholder="Pesquisar...">
    <button type="button" id="searchButton">
    <i class="fas fa-search"></i> 
  </button>
  </div>
 </div>
 

<div class="tabela">
<table class="table table-bordered table-hover mt-3">
  <thead class="table-dark cordatabela">

    <tr>
      <th scope="col"></th>
      <th scope="col">Código</th>
      <th scope="col">Produto</th>
      <th scope="col">Fornecedor</th>
      <th scope="col">Estoque</th>
      <th scope="col"> </th>

    </tr>
  </thead>
  <tbody>
  <?php
      foreach ($listaProdutos as $indice => $linha) { ?>

<tr class="">
        <th scope="row"><?php echo $indice +1; ?></th>
        <td><?php echo $linha['codigo']; ?></td>
        <td><?php echo $linha['produto']; ?></td>
        <td><?php echo $linha['fornecedor']; ?></td>
        <td><?php echo $linha['estoque']; ?></td>
        <td>
          <button type="submit" class="btn btn-cadastro">editar</button>
          <button type="submit" class="btn btn-danger" name="excluir">excluir</button>
        </td>
      </tr>
      <?php };
      ?>


    <td scope="row">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter ">+ Novo </button>
    </td>
  </tbody>
</table>
</div>
<div class="tabela">
<!--modal de cadastro para produtos -->



<script>
  function funcao1() {
    alert("Você tem certeza?");
  }
</script>

<div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="cadastro" method="POST" action="index.php?acao=produtos">
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="codigodoprodutos">Código</label>
              <input type="text" class="form-control" id="codigodoprodutos" name="codigo">
            </div>

            <div class="form-group col-md-12">
              <label for="produtos">Produto</label>
              <input type="text" class="form-control" id="produtos" name="produto">
            </div>

            <div class="form-group col-md-6">
              <label for="categoria">Categoria</label>
              <input type="texto" class="form-control" id="categoria" name="categoria">
            </div>

            <div class="form-group col-md-6">
              <label for="fornecedor">Fornecedor</label>
              <select class="form-control" aria-label=".form-select-lg example" id="fornecedor" name="fornecedor">
                <option selected> </option>
                <option value="fornecedor">Rodrigo Silva</option>
                <option value="fornecedor">Carlos Daniel</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="precodecompra">Preço de Compra</label>
              <input type="texto" class="form-control" id="precodecompra" name="precodecompra">
            </div>

            <div class="form-group col-md-3">
              <label for="venda">Preço de Venda</label>
              <input type="text" class="form-control" id="venda" name="precodevenda">
            </div>

            <div class="form-group col-md-3">
              <label for="margemdelucro">Margem de lucro[%]</label>
              <input type="texto" class="form-control" id="margemdelucro" name="margemdelucro">
            </div>

            <div class="form-group col-md-3">
              <label for="lucroanterior">Lucro anterior[%]</label>
              <input type="texto" class="form-control" id="lucroanterior" name="lucroanterior">
            </div>

            <div class="form-group col-md-3">
              <label for="estoque">Estoque</label>
              <input type="texto" class="form-control" id="estoque" name="estoque">
            </div>

            <div class="form-group col-md-6">
              <label for="validade">Validade</label>

              <input type="text" class="form-control" id="validade" name="validade">

            </div>

            <div class="form-group col-md-6">
              <form method="post"  enctype="multipart/form-data">
                <input type="file" name="fotodoproduto">
            </div>

            <div class="form-group col-md-6">
              <label for="inputobs">Observação do Produto:</label>
              <textarea id="produtossalvos" name="observacao" class="form-control" rows="8" cols="50"></textarea>
            </div>



            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="cadastrarProdutos">Cadastrar</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>