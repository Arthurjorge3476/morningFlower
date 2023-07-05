<!DOCTYPE html>
<html lang="pt-br" class="rolagem">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../css/telainicial.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script> function funcao1(){alert("Você tem certeza?");} </script>

</head>
<div class="container">
<body class="area-login">
<form class="cadastro">
    <h3>Cadastrar Produto</h3>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="codigo">Cod:</label>
        <input type="number" class="form-control" id="codigo">
      </div>
      
      <div class="form-group col-md-3">
        <label for="inputprodutos">Produto</label>
        <input type="text" class="form-control" id="inputprodutos">
      </div>
      <div class="form-group col-md-3">
        <label for="quantidade">Quantidade</label>
        <input type="number" class="form-control" id="quantidade">
      </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="compra">Preço de Compra</label>
      <input type="text" class="form-control" id="compra" >
    </div>
    <div class="form-group col-md-3">
      <label for="venda">Preço de Venda</label>
      <input type="text" class="form-control" id="venda" >
    </div>
    <div class="form-group col-md-3">
      <label for="fornecedor">Fornecedor</label>
      <select class="form-control"  aria-label=".form-select-lg example" id="fornecedor">
            <option selected> </option>
            <option value="fornecedor">Rodrigo Silva</option>
            <option value="fornecedor">Carlos Daniel</option>
          </select>
    </div>
    <div class="form-group col-md-3">
      <label for="validade">Validade</label>
      <input type="date" class="form-control" id="validade" >
    </div>
    <div class="form-group col-md-6">
    <form method="post" action="cadastroProdutos.php" enctype="multipart/form-data">
    <input type="file" name="imagem">
    </div>
    <div class="form-group col-md-6">
      <label for="inputobs">Observação do Produto:</label>
      <textarea id="produtossalvos" name="produtos"
          rows="8" cols="50">
      </textarea>
    </div>
    </div>
    <button type="submit" class="btn btn-cadastro">cadastrar</button>
    <button type="radio" class="btn btn-danger" onclick="funcao1()" value="Você tem certeza?">Cancelar</button>
  </form>
  </div>
</body>
</html>
