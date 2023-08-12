
<?php

$listaFuncionarios = select('funcionarios');



if (isset($_GET['excluir'])) {
  $idParaExcluir = $_GET['excluir'];
  deletar('funcionarios', $idParaExcluir);

  // Redirecionar para a página após a exclusão
  header("Location: index.php?acao=funcionarios");
  exit; // Certifique-se de sair do script após o redirecionamento
}



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
  <table class="table table-bordered  table-hover mt-3">
    <thead class="table-dark cordatabela">
      <tr>
        <th scope="col"></th>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone</th>
        <th scope="col"></th>

      </tr>
    </thead>
    <tbody>
    <?php
      
      foreach ($listaFuncionarios as $indice => $linha){ ?>



<tr class="">
        <th scope="row"><?php echo $indice +1; ?></th>

        <td><?php echo $linha['codigo']; ?></td>
        <td><?php echo $linha['nome']; ?></td>
        <td><?php echo $linha['email']; ?></td>
        <td><?php echo $linha['telefone']; ?></td>
        <td>
        
          <button type="submit" class="btn btn-cadastro">editar</button>
          <a href="index.php?acao=funcionarios&excluir=<?php echo $linha['id']; ?>" class="btn btn-danger">excluir</a>
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
                <input type="text" class="form-control" id="grupoFuncionario" maxlength="1" name="grupo_de_acesso">
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
