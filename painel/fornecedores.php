<?php

$listaFornecedores = select ('fornecedores');
print_r($listaFornecedores);


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
          <form class="cadastro" method="POST" action="index.php">
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="codigodofornecedor">Código</label>
                <input type="text" class="form-control" id="codigodofornecedor" name="codigo">
              </div>

              <div class="form-group col-md-12">
                <label for="nomedofornecedor">Nome da Empresa</label>
                <input type="text" class="form-control" id="nomedofornecedor" name="nome">
              </div>

              <div class="form-group col-md-6">
                  <label for="enderecodofornecedor">Endereço</label>
                  <input type="texto" class="form-control" id="enderecodofornecedor" name="endereco">
                </div>

               <div class="form-group col-md-6">
                  <label for="cidadedofornecedor">Cidade</label>
                  <input type="texto" class="form-control" id="cidadedofornecedor" name="cidade">
                </div>

                <div class="form-group col-md-2">
                  <label for="bairrodofornecedor">Bairro</label>
                  <input type="texto" class="form-control" id="bairrodofornecedor" name="bairro">
                </div>

               <div class="form-group col-md-2">
                  <label for="estadodofornecedor">Estado</label>
                  <select class="form-control" aria-label=".form-select-lg example" id="estadodofornecedor" name="estado">
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

                <div class="form-group col-md-2">
                  <label for="cepdofornecedor">CEP</label>
                  <input type="texto" class="form-control" id="cepdofornecedor" name="cep">
                </div>

                <div class="form-group col-md-3">
                  <label for="telefone1dofornecedor">Telefone 1</label>
                  <input type="texto" class="form-control" id="telefone1dofornecedor" name="telefone1">
                </div>

                <div class="form-group col-md-3">
                  <label for="telefone2dofornecedor">Telefone 2</label>
                  <input type="texto" class="form-control" id="telefone2dofornecedor" name="telefone2">
                </div>

              <div class="form-group col-md-6">
                <label for="emaildofornecedor">Email</label>
                <input type="email" class="form-control" id="emaildofornecedor" name="email">
              </div>

              <div class="form-group col-md-6">
                <label for="cnpjdofornecedor">CNPJ</label>
                <input type="text" class="form-control" id="cnpjdofornecedor" name="cnpj">
              </div>

              <div class="form-group col-md-6">
                <label for="vendedordofornecedor">Vendedor</label>
                <input type="text" class="form-control" id="vendedordofornecedor" name="vendedor">
              </div>

              <div class="form-group col-md-3">
                <label for="telefonedofornecedor">Telefone 1</label>
                <input type="text" class="form-control" id="telefonedofornecedor" name="telefonevendedor1">
              </div>

              <div class="form-group col-md-3">
                <label for="telefonedovendedor">Telefone 2</label>
                <input type="text" class="form-control" id="telefonedovendedor" name="telefonevendedor2">
              </div>
              
              <div class="form-group col-md-6">
                <label for="codicaodavenda">Condição da venda</label>
                <input type="text" class="form-control" id="codicaodavenda" name="condicaodavenda">
              </div>


              <div class="form-group col-md-6">
                <label for="atividadedavenda">Atividade</label>
                <input type="text" class="form-control" id="atividadedavenda" name="atividade">
              </div>


              <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="cadastrarFornecedores">Cadastrar</button>
        </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
