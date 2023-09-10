<!DOCTYPE html>
<html>

<head>
  <title>Formulário Comprovante Fiscal</title>


</head>

<body>

  <h1>Formulário Comprovante Fiscal</h1>
  <form class="cadastro" method="POST" action="comprovante_fiscal.php">
    <div class="form-row">
      <div class="form-group col-md-9">
        <label for="nomeFuncionario">Nome</label>
        <input type="text" class="form-control" name="nome_cliente" required>
      </div>

      <div class="form-group col-md-4">
        <label for="cidadeFuncionario">Cidade</label>
        <input type="text" class="form-control" name="cidade" required>
      </div>
      <div class="form-group col-md-4">
        <label for="enderecoFuncionario">Endereço</label>
        <input type="text" class="form-control" name="endereco" required>
      </div>
      <div class="form-group col-md-4">
        <label for="cepFuncionario">CEP</label>
        <input type="text" class="form-control" name="cep" required>
      </div>
      <div class="form-group col-md-4">
        <label for="telefoneFuncionario">Telefone</label>
        <input type="text" class="form-control" name="telefone" required>
      </div>
      <div class="form-group col-md-4">
        <label for="emailFuncionario">Produto Retirado</label>
        <input type="text" class="form-control" name="produto_retirado" required>
      </div>
      <div class="form-group col-md-4">
        <label for="quantidade_retirada">Quantidade Retirada</label>
        <input type="text" class="form-control" name="quantidade_retirada" required>
      </div>
      <div class="form-group col-md-4">
        <label for="valor">Valor</label>
        <input type="text" class="form-control" name="valor" required>
      </div>


      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Gerar Comprovante">
      </div>
  </form>

</body>

</html>