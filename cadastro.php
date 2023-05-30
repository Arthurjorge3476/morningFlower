<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="telainicial.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<div class="container">
<body class="imagem">
<form class="cadastro">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputnome4">Nome</label>
        <input type="nome" class="form-control" id="inputnome4" placeholder="Gabriela...">
      </div>
      
      <div class="form-group col-md-6">
        <label for="inputPassword4">Senha</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="********">
      </div>
      <div class="form-group col-md-12">
        <label for="inputusuario4">Usuário</label>
        <input type="usuario" class="form-control" id="inputusuario4" placeholder="como você quer seu nome de Usuário">
      </div>
    </div>
    <div class="form-group ">
      <label for="inputAddress2">Email</label>
      <input type="text" class="form-control" id="inputAddress2" placeholder="gabrielamatos2gmail.com.">
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputtelefone2">Telefone</label>
      <input type="text" class="form-control" id="inputtelefone2" placeholder="(48)*****-****">
    </div>
    <div class="form-group col-md-6">
      <label for="inputcpf2">CPF</label>
      <input type="text" class="form-control" id="inputcpf2" placeholder="***.***.***-**">
    </div>
    </div>
    <div class="form-group">
      
    </div>
    <button type="submit" class="btn btn-cadastro">Entrar</button>
    <button type="submit" class="btn btn-danger"><a href="index.php">Cancelar</a></button>
  </form>
  </div>
</body>
</html>
