<table class="table table-bordered table-hover">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">nome</th>
      <th scope="col">fornecedor</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>478689867</td>
      <td>arroz</td>
      <td>paulo</td>
      <td>
        <button type="submit" class="btn btn-cadastro">editar</button>
        <button type="submit" class="btn btn-danger">excluir</button>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>3241412</td>
      <td>farinha</td>
      <td>sergio</td>
      <td>
        <button type="submit" class="btn btn-cadastro">editar</button>
        <button type="submit" class="btn btn-danger">excluir</button>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>2341312</td>
      <td>batata</td>
      <td>roberto</td>
      <td>
        <button type="submit" class="btn btn-cadastro">editar</button>
        <button type="submit" class="btn btn-danger">excluir</button>
      </td>
    </tr>
  </tbody>
</table>

<!--modal de cadastro para produtos -->


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter ">+ Novo </button>
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
        <form class="cadastro" method="POST" action="../autenticarprodutos.php">
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
              <label for="precodecusto">Preço de Custo</label>
              <input type="texto" class="form-control" id="precodecusto" name="precodecusto">
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
              <input type="email" class="form-control" id="validade" name="validade">
            </div>

            <div class="form-group col-md-6">
              <form method="post" action="cadastroProdutos.php" enctype="multipart/form-data">
                <input type="file" name="fotodoproduto">
            </div>

            <div class="form-group col-md-6">
              <label for="inputobs">Observação do Produto:</label>
              <textarea id="produtossalvos" name="observacao" class="form-control" rows="8" cols="50"></textarea>
            </div>



            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>