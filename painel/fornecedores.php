<?php

$listaFornecedores = select('fornecedores');

if (isset($_GET['excluir'])) {
  $idParaExcluir = $_GET['excluir'];
  deletar('fornecedores', $idParaExcluir);

  // Redirecionar para a página após a exclusão
  header("Location: index.php?acao=fornecedores");
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
<table class="table table-bordered table-hover mt-3">
    <thead class="table-dark cordatabela">
      <tr>
        <th scope="col"></th>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($listaFornecedores as $indice => $linha) { ?>

<tr class="">
        <th scope="row"><?php echo $indice +1;?></th>
        <td><?php echo $linha['codigo'];?></td>
        <td><?php echo $linha['nome'];?></td>
        <td><?php echo $linha['email'];?></td>
        <td><?php echo $linha['telefone1'];?></td>
        <td>
          <button type="submit" class="btn btn-cadastro">editar</button>
        </td>
        <td>
        <a href="index.php?acao=fornecedores&excluir" class="btn btn-outline-danger btn-sm excluir-fornecedores" data-id="<?php echo $linha['id']; ?>" data-nome="<?php echo $linha['nome']; ?>" >excluir</a>
         <!-- Modal de confirmação de exclusão personalizada -->
         <div class="modal fade" id="confirmacaoExclusao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Exclusão de Fornecedores</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Você deseja excluir  o fornecedor <span id="nomeFornecedoresExclusao"></span>?
                        </div>
                        <div class="modal-footer">
                          <a href="#" id="confirmarExclusao" class="btn btn-danger">Confirmar Exclusão</a>
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                    </div>
                  </div>

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
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Fornecedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="cadastro" method="POST" action="index.php">
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="codigodofornecedor">Código*</label>
                <input type="text" class="form-control" id="codigodofornecedor" name="codigo" required>
              </div>

              <div class="form-group col-md-12">
                <label for="nomedofornecedor">Nome da Empresa*</label>
                <input type="text" class="form-control" id="nomedofornecedor" name="nome" required>
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

               <div class="form-group col-md-2" >
                  <label for="estadodofornecedor" >Estado</label>
                  <select class="form-control" aria-label=".form-select-lg example" id="estadodofornecedor" name="estado" style="border-radius: 18px;font-size: 19px; ">
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
                  <input type="texto" class="form-control" id="cepdofornecedor" name="cep" oninput="this.value = formatarCEP(this.value);" maxlength="9">
                </div>

                <div class="form-group col-md-3">
                  <label for="telefone1dofornecedor">Telefone 1*</label>
                  <input type="texto" class="form-control" id="telefone1dofornecedor" name="telefone1" oninput="this.value = formatarTelefone(this.value);" maxlength="15" required>
                </div>

                <div class="form-group col-md-3">
                  <label for="telefone2dofornecedor">Telefone 2</label>
                  <input type="texto" class="form-control" id="telefone2dofornecedor" name="telefone2" oninput="this.value = formatarTelefone2(this.value);" maxlength="15">
                </div>

              <div class="form-group col-md-6">
                <label for="emaildofornecedor">Email*</label>
                <input type="email" class="form-control" id="emaildofornecedor" name="email">
              </div>

              <div class="form-group col-md-6">
                <label for="cnpjdofornecedor">CNPJ*</label>
                <input type="text" class="form-control" id="cnpjdofornecedor" name="cnpj"  oninput="this.value = formatarCNPJ(this.value);" maxlength="18" required>
              </div>

              <div class="form-group col-md-6">
                <label for="vendedordofornecedor">Vendedor</label>
                <input type="text" class="form-control" id="vendedordofornecedor" name="vendedor">
              </div>

              <div class="form-group col-md-3">
                <label for="telefonedofornecedor">Telefone 1*</label>
                <input type="text" class="form-control" id="telefonedofornecedor" name="telefonevendedor1" oninput="this.value = formatarTelefonevendedor(this.value);" maxlength="15">
              </div>

              <div class="form-group col-md-3">
                <label for="telefonedovendedor">Telefone 2</label>
                <input type="text" class="form-control" id="telefonedovendedor" name="telefonevendedor2"  oninput="this.value = formatarTelefonevendedor2(this.value);" maxlength="15">
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

  <script>
    function formatarCEP(cep) {
            cep = cep.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            cep = cep.replace(/^(\d{5})(\d{3})$/, '$1-$2'); // Insere a barra
            return cep;
        }

    function formatarTelefone(telefone1) {
            telefone1 = telefone1.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            telefone1 = telefone1.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3'); // Formatação do telefone
            return telefone1;
        }

        function formatarTelefone2(telefone2) {
            telefone2 = telefone2.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            telefone2 = telefone2.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3'); // Formatação do telefone
            return telefone2;
        }
      
      function formatarTelefonevendedor(telefonevendedor1){
        telefonevendedor1 = telefonevendedor1.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
        telefonevendedor1 = telefonevendedor1.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3'); // Formatação do telefone
        return telefonevendedor1;
      }

      function formatarTelefonevendedor2(telefonevendedor2){
        telefonevendedor2 = telefonevendedor2.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
        telefonevendedor2 = telefonevendedor2.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3'); // Formatação do telefone
        return telefonevendedor2;
      }
      function formatarCNPJ(cnpj){
        cnpj = cnpj.replace(/\D/g, '');
        cnpj = cnpj.replace(/(\d{2})(\d)/, '$1.$2'); // Insere o primeiro ponto
        cnpj = cnpj.replace(/(\d{3})(\d)/, '$1.$2'); // Insere o segundo ponto
        cnpj = cnpj.replace(/(\d{3})(\d)/, '$1/$2'); // Insere o segundo ponto
        cnpj = cnpj.replace(/(\d{4})(\d{2})$/, '$1-$2'); // Insere o hífen
        return cnpj;

      }
  </script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Adicionar um evento de clique a todos os links com a classe 'excluir-funcionario'
    const excluirLinks = document.querySelectorAll('.excluir-fornecedores');
    const nomeFornecedoresExclusao = document.getElementById('nomeFornecedoresExclusao');
    const confirmarExclusao = document.getElementById('confirmarExclusao');

    excluirLinks.forEach(function (link) {
      link.addEventListener('click', function (event) {
        event.preventDefault(); // Evita que o link seja seguido

        const fornecedoresID = this.getAttribute('data-id'); // Obtém o ID do funcionário
        const nomeFornecedores = this.getAttribute('data-nome'); // Obtém o nome do funcionário

        nomeFornecedoresExclusao.textContent = nomeFornecedores; // Atualiza o nome na modal

        // Adiciona um evento de clique ao botão 'Confirmar Exclusão'
        confirmarExclusao.addEventListener('click', function () {
          // Redireciona para a página de exclusão com o ID do funcionário
          window.location.href = `index.php?acao=fornecedores&excluir=${fornecedoresID}`;
        });

        // Abre a modal de confirmação
        $('#confirmacaoExclusao').modal('show');
      });
    });
  });
</script>