<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
  <table class="table table-bordered  table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">nome</th>
        <th scope="col">gmail</th>
        <th scope="col">telefone</th>
        <th scope="col"></th>

      </tr>
    </thead>
    <tbody>
      <tr class="">
        <th scope="row">1</th>
        <td>478689867</td>
        <td>paulo</td>
        <td>paulo1@gmail.com</td>
        <td>9912141516</td>
        <td>
          <button type="submit" class="btn btn-cadastro">editar</button>
          <button type="submit" class="btn btn-danger">excluir</button>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>3241412</td>
        <td>Sergio</td>
        <td>Sergio2@gmail.com</td>
        <td>9912141516</td>
        <td>
          <button type="submit" class="btn btn-cadastro">editar</button>
          <button type="submit" class="btn btn-danger">excluir</button>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>2341312</td>
        <td>Roberto</td>
        <td>Roberto3@gmail.com</td>
        <td>9912141516</td>
        <td>
          <button type="submit" class="btn btn-cadastro">editar</button>
          <button type="submit" class="btn btn-danger">excluir</button>
        </td>
      </tr>

      <tr>
        <th scope="row">4</th>
        <td>2341312</td>
        <td>João</td>
        <td>João4@gmail.com</td>
        <td>9912141516</td>
        <td>
          <button type="submit" class="btn btn-cadastro">editar</button>
          <button type="submit" class="btn btn-danger">excluir</button>
        </td>
    </tbody>
  </table>

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
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Funcionario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form class="cadastro"  method="POST" action="../autenticarfuncionarios.php">

            <div class="form-row">
              <div class="form-group col-md-9">
                <label for="nomeFuncionario">Nome</label>
                <input type="text" class="form-control" id="nomeFuncionario">
              </div>
              <div class="form-group col-md-3">
                <label for="datadenascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="datadenascimento">
              </div>
              <div class="form-group col-md-4">
                <label for="rgdoFuncionario">RG</label>
                <input type="text" class="form-control" id="rgdofuncionario">
              </div>
              <div class="form-group col-md-4">
                <label for="cpfFuncionario">CPF</label>
                <input type="text" class="form-control" id="cpfFuncionario">
              </div>
              <div class="form-group col-md-4">
                <label for="ctpsFuncionario">CTPS</label>
                <input type="text" class="form-control" id="ctpsFuncionario">
              </div>
              <div class="form-group col-md-4">
                <label for="cidadeFuncionario">Cidade</label>
                <input type="text" class="form-control" id="cidadeFuncionario">
              </div>
              <div class="form-group col-md-4">
                <label for="enderecoFuncionario">Endereço</label>
                <input type="text" class="form-control" id="enderecoFuncionario">
              </div>
              <div class="form-group col-md-4">
                <label for="cepFuncionario">CEP</label>
                <input type="text" class="form-control" id="cepFuncionario">
              </div>
              <div class="form-group col-md-4">
                <label for="emailFuncionario">Email</label>
                <input type="e-mail" class="form-control" id="emailFuncionario">
              </div>
              <div class="form-group col-md-4">
                <label for="telefoneFuncionario">Telefone</label>
                <input type="text" class="form-control" id="telefoneFuncionario">
              </div>
              <div class="form-group col-md-4">
                <label for="senhaFuncionario">Senha</label>
                <input type="password" class="form-control" id="senhaFuncionario">
              </div>
              <div class="form-group col-md-3">
                <label for="grupoFuncionario">Grupo de Acesso</label>
                <input type="text" class="form-control" id="grupoFuncionario">
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>