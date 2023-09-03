<?php

$listaFornecedores = select('fornecedores');

if (isset($_GET['excluir'])) {
  $idParaExcluir = $_GET['excluir'];
  deletar('fornecedores', $idParaExcluir);

  // Redirecionar para a página após a exclusão
  header("Location: index.php?acao=fornecedores");
  exit; // Certifique-se de sair do script após o redirecionamento
}


if (isset($_POST['btnEditar'])) {
  // Certifique-se de definir $id com o ID do funcionário que está sendo editado
  $id = $_POST['idFornecedoresEditar'];

  $conexao = conectar();

  $codigo = $_POST['codigo'];
  $nome = $_POST['nome'];
  $endereco = $_POST['endereco'];
  $cidade = $_POST['cidade'];
  $bairro = $_POST['bairro'];
  $estado = $_POST['estado'];
  $cep = $_POST['cep'];
  $telefone1 = $_POST['telefone1'];
  $telefone2 = $_POST['telefone2'];
  $email = $_POST['email'];
  $cnpj = $_POST['cnpj'];
  $vendedor = $_POST['vendedor'];
  $telefonevendedor1 = $_POST['telefonevendedor1'];
  $telefonevendedor2 = $_POST['telefonevendedor2'];
  $condicaodavenda = $_POST['condicaodavenda'];
  $atividade = $_POST['atividade'];

  // Atualize o funcionário no banco de dados
  $sql_update = "UPDATE fornecedores SET codigo = :codigo, nome = :nome, endereco = :endereco, cidade = :cidade, bairro = :bairro, estado = :estado, cep = :cep, telefone1 = :telefone1, telefone2 = :telefone2, email = :email, cnpj = :cnpj, vendedor = :vendedor,telefonevendedor1 = :telefonevendedor1,telefonevendedor2 = :telefonevendedor2,condicaodavenda = :condicaodavenda,atividade = :atividade WHERE id = :id";

  $stmt_update = $conexao->prepare($sql_update);

  $stmt_update->bindParam(':id', $id);
  $stmt_update->bindParam(':codigo', $codigo);
  $stmt_update->bindParam(':nome', $nome);
  $stmt_update->bindParam(':endereco', $endereco);
  $stmt_update->bindParam(':cidade', $cidade);
  $stmt_update->bindParam(':bairro', $bairro);
  $stmt_update->bindParam(':estado', $estado);
  $stmt_update->bindParam(':cep', $cep);
  $stmt_update->bindParam(':telefone1', $telefone1);
  $stmt_update->bindParam(':telefone2', $telefone2);
  $stmt_update->bindParam(':email', $email);
  $stmt_update->bindParam(':cnpj', $cnpj);
  $stmt_update->bindParam(':vendedor', $vendedor);
  $stmt_update->bindParam(':telefonevendedor1', $telefonevendedor1);
  $stmt_update->bindParam(':telefonevendedor2', $telefonevendedor2);
  $stmt_update->bindParam(':condicaodavenda', $condicaodavenda);
  $stmt_update->bindParam(':atividade', $atividade);

  $result_update = $stmt_update->execute();

  if (!$result_update) {
      var_dump($stmt_update->errorInfo());
      exit;
  } else {
      echo $stmt_update->rowCount() . " Linha atualizada";
      header("Location: index.php?acao=fornecedores");
      exit;
  }
}



?>
 
 <form method="POST" action="index.php?acao=fornecedores">
    <div class="search-container">
        <div class="search-wrapper">
            <input type="text" id="searchInput" name="pesquisar" placeholder="Pesquisar...">
            <button type="submit" id="searchButton" onclick="searchDate()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
            </button>
        </div>
    </div>
</form>


<div class="tabela"> 
<table class="table table-bordered table-hover mt-3">
    <thead class="table-dark cordatabela">
      <tr>
        <th scope="col"></th>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">CNPJ</th>
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
        <td><?php echo $linha['cnpj'];?></td>
        <td><?php echo $linha['telefone1'];?></td>
        <td>
        <div>
        <a href="index.php?acao=fornecedores&editar=<?php echo $linha['id']; ?>" class="btn btn-outline-warning btn-sm editar-fornecedores" data-info='<?php echo json_encode($linha); ?>' data-toggle="modal" data-target="#editarFornecedoresModal" name="editar">Editar</a>

    <div class="modal fade " id="editarFornecedoresModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Fornecedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="formEditarFornecedor" method="POST" action="index.php?acao=fornecedores">
          <!-- Campos de edição de funcionário -->
          <input type="hidden" id="idFornecedoresEditar" name="idFornecedoresEditar">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="submit" for="formEditarFornecedor" name="btnEditar" class="btn btn-primary">

              </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>


        </div>

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
          <form class="cadastro" method="POST" action="index.php?acao=fornecedores">
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

<script>
  $(document).ready(function () {
    // Função para preencher a modal de edição com informações do funcionário
    $(".editar-fornecedores").on("click", function () {
      var funcionario = $(this).data("info");
      $("#editNome").val(funcionario.nome);
      // Preencha outros campos de edição aqui
    });

    // Função para enviar os dados de edição para o servidor
    $("#salvarEdicao").on("click", function () {
      var dadosEdicao = $("#formEditarFornecedor").serialize();
      $.ajax({
        type: "POST",
        url: "editar_fornecedores.php", // Substitua pelo seu arquivo de edição PHP
        data: dadosEdicao,
        success: function (response) {
          if (response === "success") {
            // Atualização bem-sucedida
            alert("Funcionário atualizado com sucesso.");
            location.reload(); // Recarregue a página para exibir as alterações
          } else {
            // Trate os erros aqui
            alert("Ocorreu um erro ao atualizar o funcionário.");
          }
        },
      });
    });
  });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editarLinks = document.querySelectorAll('.editar-fornecedores');
        const idFornecedoresEditar = document.getElementById('idFornecedoresEditar');
        const codigodofornecedor = document.getElementById('codigodofornecedor');
        const nomedofornecedor = document.getElementById('nomedofornecedor'); // Campo CPF
        const enderecodofornecedor = document.getElementById('enderecodofornecedor');
        const cidadedofornecedor = document.getElementById('cidadedofornecedor');
        const bairrodofornecedor = document.getElementById('bairrodofornecedor');
        const estadodofornecedor = document.getElementById('estadodofornecedor');
        const cepdofornecedor = document.getElementById('cepdofornecedor');
        const telefone1dofornecedor = document.getElementById('telefone1dofornecedor');
        const telefone2dofornecedor = document.getElementById('telefone2dofornecedor');
        const emaildofornecedor = document.getElementById('emaildofornecedor');
        const cnpjdofornecedor = document.getElementById('cnpjdofornecedor');
        const vendedordofornecedor = document.getElementById('vendedordofornecedor');
        const telefonedofornecedor = document.getElementById('telefonedofornecedor');
        const telefonedovendedor = document.getElementById('telefonedovendedor');
        const codicaodavenda = document.getElementById('codicaodavenda');
        const atividadedavenda = document.getElementById('atividadedavenda');
        // Outros campos de edição...

        editarLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                // Obtenha as informações do funcionário a partir do atributo 'data-info'
                const infoFornecedor = JSON.parse(this.getAttribute('data-info'));

                // Preencha os campos da modal com as informações do funcionário
                idFornecedoresEditar.value = infoFornecedor.id;
                codigodofornecedor.value = infoFornecedor.codigo;
                nomedofornecedor.value = infoFornecedor.nome;
                enderecodofornecedor.value = infoFornecedor.endereco; 
                cidadedofornecedor.value = infoFornecedor.cidade;
                bairrodofornecedor.value = infoFornecedor.bairro;
                estadodofornecedor.value = infoFornecedor.estado;
                cepdofornecedor.value = infoFornecedor.cep;
                telefone1dofornecedor.value = infoFornecedor.telefone1;
                telefone2dofornecedor.value = infoFornecedor.telefone2;
                emaildofornecedor.value = infoFornecedor.email;
                cnpjdofornecedor.value = infoFornecedor.cnpj;
                vendedordofornecedor.value = infoFornecedor.vendedor;
                telefonedofornecedor.value = infoFornecedor.telefonevendedor1;
                telefonedovendedor.value = infoFornecedor.telefonevendedor2;
                codicaodavenda.value = infoFornecedor.condicaodavenda;
                atividadedavenda.value = infoFornecedor.atividade;
                // Preencha outros campos de edição conforme necessário

                // Abra a modal de edição
                $('#editarFornecedoresModal').modal('show');
            });
        });

        // Resto do seu código JavaScript...
    });
</script>


<script>
  var search = document.getElementById('searchInput');

  search.addEventListener("keydown", function(event) {
    if (event.key === "Enter")
    {
      searchDate();
    }
  });




  function searchDate()
  {
    window.location = 'index.php?acao=fornecedores&search='+ search.value;
  }
</script>