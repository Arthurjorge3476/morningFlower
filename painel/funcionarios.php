
<?php

$listaFuncionarios = select ('funcionarios');
print_r($listaFuncionarios);


?>



<div> 
            <h2>Área de Pesquisa</h2>
    <form action="consulta.SQL.php" method="POST">
        <label for="pesquisa">Digite sua pesquisa:</label>
        <input type="text" name="pesquisa" id="pesquisa" required>
        <br>
        <input type="submit" value="Pesquisar">
    </form>  
 </div>
 
>>>>>>> f773c1a74b4bc450c36c72f5f301f78980f2003c
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

          <form class="cadastro"  method="POST" action="index.php?acao=funcionarios">

            <div class="form-row">
              <div class="form-group col-md-9">
                <label for="nomeFuncionario">Nome</label>
                <input type="text" class="form-control" id="nomeFuncionario" name="nome">
              </div>
              <div class="form-group col-md-3">
                <label for="datadenascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="datadenascimento" name="data_de_nascimento">
              </div>
              <div class="form-group col-md-4">
                <label for="rgdoFuncionario">RG</label>
                <input type="text" class="form-control" id="rgdofuncionario" name="rg">
              </div>
              <div class="form-group col-md-4">
                <label for="cpfFuncionario">CPF</label>
                <input type="text" class="form-control" id="cpfFuncionario" name="cpf">
              </div>
              <div class="form-group col-md-4">
                <label for="ctpsFuncionario">CTPS</label>
                <input type="text" class="form-control" id="ctpsFuncionario" name="ctps">
              </div>
              <div class="form-group col-md-4">
                <label for="cidadeFuncionario">Cidade</label>
                <input type="text" class="form-control" id="cidadeFuncionario" name="cidade">
              </div>
              <div class="form-group col-md-4">
                <label for="enderecoFuncionario">Endereço</label>
                <input type="text" class="form-control" id="enderecoFuncionario" name="endereco">
              </div>
              <div class="form-group col-md-4">
                <label for="cepFuncionario">CEP</label>
                <input type="text" class="form-control" id="cepFuncionario" name="cep">
              </div>
              <div class="form-group col-md-4">
                <label for="emailFuncionario">Email</label>
                <input type="e-mail" class="form-control" id="emailFuncionario" name="email">
              </div>
              <div class="form-group col-md-4">
                <label for="telefoneFuncionario">Telefone</label>
                <input type="text" class="form-control" id="telefoneFuncionario" name="telefone">
              </div>
              <div class="form-group col-md-4">
                <label for="senhaFuncionario">Senha</label>
                <input type="password" class="form-control" id="senhaFuncionario" name="senha">
              </div>
              <div class="form-group col-md-3">
                <label for="grupoFuncionario">Grupo de Acesso</label>
                <input type="text" class="form-control" id="grupoFuncionario" max='1' name="grupo_de_acesso">
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="cadastrarFuncionarios">Cadastrar</button>
                  
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
