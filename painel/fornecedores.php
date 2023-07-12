<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
  <table class="table table-bordered table-hover">
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

      <tr>
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
      </tr>

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
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Fornecedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="cadastro">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nomedofornecedor">Nome</label>
                <input type="nome" class="form-control" id="nomedofornecedor">
              </div>
              <div class="form-group col-md-6">
                <label for="cpfdofornecedor">CPF</label>
                <input type="text" class="form-control" id="cpfdofornecedor">
              </div>
              <div class="form-group col-md-12">
                <label for="emaildofornecedor">Email</label>
                <input type="email" class="form-control" id="emaildofornecedor">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="telefonedofornecedor">Telefone</label>
                  <input type="text" class="form-control" id="telefonedofornecedor">
                </div>
                <div class="form-group col-md-6">
                  <label for="cidadedofornecedor">Cidade</label>
                  <input type="texto" class="form-control" id="cidadedofornecedor">
                </div>

                <div class="form-group col-md-6">
                  <label for="estadodofornecedor">Estado</label>
                  <select class="form-control" aria-label=".form-select-lg example" id="estadodofornecedor">
                    <option selected> </option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="CO">CO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>


                  </select>
                </div>

                <div class="form-group col-md-12">
                  <label for="empresadofornecedor">Empresa</label>
                  <input type="text" class="form-control" id="empresadofornecedor">
                </div>
              </div>



            </div>
            <div class="form-group col-md-6">

            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Cadastrar</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>