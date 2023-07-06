<!DOCTYPE html>
<html lang="pt-br" class="rolagem">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
    <link rel="stylesheet" href="../css/telainicial.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script> function funcao1(){alert("Você tem certeza?");} </script>
</head>
<div class="container" >
<body class="area-login">
  <?php
     include_once("conexao.php");
  ?>

<form class="cadastro"  method="POST">
<h3>Cadastrar  Funcionario</h3>

    <div class="form-row" >
    <div class="form-group col-md-3">
        <label for="codigoFuncionario">Código</label>
        <input type="text" class="form-control" id="codigoFuncionario" >
      </div>
      <div class="form-group col-md-6">
        <label for="nomeFuncionario">Nome</label>
        <input type="text" class="form-control" id="nomeFuncionario" >
      </div>
      <div class="form-group col-md-3">
        <label for="datadenascimento">Data de Nascimento</label>
        <input type="text" class="form-control" id="datadenascimento" >
      </div>
      <div class="form-group col-md-4">
        <label for="rgdoFuncionario">RG</label>
        <input type="text" class="form-control" id="rgdofuncionario" >
      </div>
      <div class="form-group col-md-4">
      <label for="cpfFuncionario">CPF</label>
      <input type="text" class="form-control" id="cpfFuncionario" >
    </div>
    <div class="form-group col-md-4">
        <label for="ctpsFuncionario">CTPS</label>
        <input type="text" class="form-control" id="ctpsFuncionario" >
      </div>
      <div class="form-group col-md-4">
        <label for="cidadeFuncionario">Cidade</label>
        <input type="text" class="form-control" id="cidadeFuncionario" >
      </div>
      <div class="form-group col-md-4">
        <label for="enderecoFuncionario">Endereço</label>
        <input type="text" class="form-control" id="enderecoFuncionario" >
      </div>
      <div class="form-group col-md-4">
        <label for="cepFuncionario">CEP</label>
        <input type="text" class="form-control" id="cepFuncionario" >
      </div>
    <div class="form-group col-md-4">
      <label for="emailFuncionario">Email</label>
      <input type="email" class="form-control" id="emailFuncionario" >
    </div>
    <div class="form-group col-md-4">
      <label for="telefoneFuncionario">Telefone</label>
      <input type="text" class="form-control" id="telefoneFuncionario" >
    </div>
    <div class="form-group col-md-4">
        <label for="senhaFuncionario">Senha</label>
        <input type="text" class="form-control" id="senhaFuncionario" >
      </div>
    <div class="form-group col-md-3">
        <label for="grupoFuncionario">Grupo de Acesso</label>
        <input type="text" class="form-control" id="grupoFuncionario" >
    </div> 
</div>
   
    <button type="submit" class="btn btn-cadastro">cadastrar</button>
    <button type="radio" class="btn btn-danger" onclick="funcao1()" value="Você tem certeza?">Cancelar</button>
  </form>
  </div>
</body>
</html>