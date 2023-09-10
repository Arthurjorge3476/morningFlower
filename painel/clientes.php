<?php

$listaClientes = select('clientes');



if (isset($_POST['btnEditar'])) {
  // Certifique-se de definir $id com o ID do funcionário que está sendo editado
  $id = $_POST['idClienteEditar'];

  $conexao = conectar();

  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $cidade = $_POST['cidade'];
  $endereco = $_POST['endereco'];
  $cep = $_POST['cep'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];

  // Atualize o funcionário no banco de dados
  $sql_update = "UPDATE cliente SET nome = :nome,  cpf = :cpf, cidade = :cidade, endereco = :endereco, cep = :cep, email = :email, telefone = :telefone,";

  $stmt_update = $conexao->prepare($sql_update);

  $stmt_update->bindParam(':id', $id);
  $stmt_update->bindParam(':nome', $nome);
  $stmt_update->bindParam(':cpf', $cpf);
  $stmt_update->bindParam(':cidade', $cidade);
  $stmt_update->bindParam(':endereco', $endereco);
  $stmt_update->bindParam(':cep', $cep);
  $stmt_update->bindParam(':email', $email);
  $stmt_update->bindParam(':telefone', $telefone);


  $result_update = $stmt_update->execute();

  if (!$result_update) {
    var_dump($stmt_update->errorInfo());
    exit;
  } else {
    echo $stmt_update->rowCount() . " Linha atualizada";
    header("Location: index.php?acao=clientes");
    exit;
  }
}




if (isset($_GET['excluir'])) {
  $idParaExcluir = $_GET['excluir'];
  deletar('clientes', $idParaExcluir);

  // Redirecionar para a página após a exclusão
  header("Location: index.php?acao=clientes");
  exit; // Certifique-se de sair do script após o redirecionamento
}


if (isset($_POST['pesquisar'])) {
  $termoPesquisa = $_POST['pesquisar'];
  $listaClientes = array_filter($listaClientes, function ($cliente) use ($termoPesquisa) {
    // Aqui, você pode ajustar como deseja que a pesquisa seja realizada.
    // Atualmente, ela é case-insensitive e verifica se o nome contém o termo de pesquisa.
    return stripos($cliente['nome'], $termoPesquisa) !== false;
  });
}


?>

<form method="POST" action="index.php?acao=clientes">
  <div class="search-container">
    <div class="search-wrapper">
      <input type="text" id="searchInput" name="pesquisar" placeholder="Pesquisar...">
      <button type="submit" id="searchButton" onclick="searchDate()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg>
      </button>
    </div>
  </div>
</form>





<div class="tabela">
  <table class="table table-bordered  table-hover mt-3">
    <thead class="table-dark cordatabela">
      <tr>
        <th scope="col"></th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Endereço</th>
        <th scope="col">Telefone</th>
        <th scope="col">Cidade</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php

      foreach ($listaClientes as $indice => $linha) { ?>

        <tr class="">
          <th scope="row"><?php echo $indice + 1; ?></th>

          <td><?php echo $linha['nome']; ?></td>
          <td><?php echo $linha['cpf']; ?></td>
          <td><?php echo $linha['endereco']; ?></td>
          <td><?php echo $linha['telefone']; ?></td>
          <td><?php echo $linha['cidade']; ?></td>
          <td>
            <div>
              <a href="index.php?acao=clientes&editar=<?php echo $linha['id']; ?>" class="btn btn-outline-warning btn-sm editar-Cliente" data-info='<?php echo json_encode($linha); ?>' data-toggle="modal" data-target="#editarClienteModal" name="editar">Editar</a>





              <div class="modal fade" id="editarClienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulário de Edição de Funcionário -->
                      <form id="formEditarCliente" method="POST" action="index.php?acao=Clientes">
                        <!-- Campos de edição de funcionário -->
                        <input type="hidden" id="idClienteEditar" name="idClienteEditar">
                        <div class="form-row">
                          <div class="form-group col-md-9">
                            <label for="nomeClienteEditar">Nome*</label>
                            <input type="text" class="form-control" id="nomeClienteEditar" name="nome" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="cpfCliente">CPF*</label>
                            <input type="text" class="form-control" id="cpfCliente" name="cpf" oninput="this.value = formatarCPF(this.value);" maxlength="14" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="cidadeClienteEditar">Cidade</label>
                            <input type="text" class="form-control" id="cidadeClienteEditar" name="cidade" oninput="this.value = formatarCidade(this.value);">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="enderecoClienteEditar">Endereço</label>
                            <input type="text" class="form-control" id="enderecoClienteEditar" name="endereco" oninput="this.value = formatarEndereco(this.value);">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="cepClienteEditar">CEP</label>
                            <input type="text" class="form-control" id="cepClienteEditar" name="cep" oninput="this.value = formatarCEP(this.value);" maxlength="9">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="emailClienteEditar">Email*</label>
                            <input type="e-mail" class="form-control" id="emailClienteEditar" name="email" oninput="this.value = formatarEmail(this.value);" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="telefoneClienteEditar">Telefone*</label>
                            <input type="text" class="form-control" id="telefoneClienteEditar" name="telefone" oninput="this.value = formatarTelefone(this.value);" maxlength="15" required>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" for="formEditarCliente" name="btnEditar" class="btn btn-primary">

                          </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>




          <td><a href="index.php?acao=clientes&excluir" class="btn btn-outline-danger btn-sm excluir-clientes" data-id="<?php echo $linha['id']; ?>" data-nome="<?php echo $linha['nome']; ?>">excluir</a></td>

          <!-- Modal de confirmação de exclusão personalizada -->
          <div class="modal fade" id="confirmacaoExclusao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Exclusão de Cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Você deseja excluir o Cliente <span id="nomeClienteExclusao"></span>?
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
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="cadastro" method="POST" action="index.php?acao=clientes">

          <div class="form-row">
            <div class="form-group col-md-9">
              <label for="nomeCliente">Nome*</label>
              <input type="text" class="form-control" id="nomeCliente" name="nome" required>
            </div>
            <div class="form-group col-md-4">
              <label for="cpfCliente">CPF*</label>
              <input type="text" class="form-control" id="cpfCliente" name="cpf" oninput="this.value = formatarCPF(this.value);" maxlength="14" required>
            </div>
            <div class="form-group col-md-4">
              <label for="cidadeCliente">Cidade</label>
              <input type="text" class="form-control" id="cidadeCliente" name="cidade">
            </div>
            <div class="form-group col-md-4">
              <label for="enderecoCliente">Endereço</label>
              <input type="text" class="form-control" id="enderecoCliente" name="endereco">
            </div>
            <div class="form-group col-md-4">
              <label for="cepCliente">CEP</label>
              <input type="text" class="form-control" id="cepCliente" name="cep" oninput="this.value = formatarCEP(this.value);" maxlength="9">
            </div>
            <div class="form-group col-md-4">
              <label for="emailCliente">Email*</label>
              <input type="e-mail" class="form-control" id="emailCliente" name="email" required>
            </div>
            <div class="form-group col-md-4">
              <label for="telefoneCliente">Telefone*</label>
              <input type="text" class="form-control" id="telefoneCliente" name="telefone" oninput="this.value = formatarTelefone(this.value);" maxlength="15" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="cadastrarClientes">Cadastrar</button>

            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>


<?php  ?>
</tbody>
</table>


<script>
  function formatarCEP(cep) {
    cep = cep.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    cep = cep.replace(/^(\d{5})(\d{3})$/, '$1-$2'); // Insere a barra
    return cep;
  }

  function formatarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Insere o primeiro ponto
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Insere o segundo ponto
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Insere o segundo ponto
    cpf = cpf.replace(/(\d{3})(\d{2})$/, '$1-$2'); // Insere o hífen
    return cpf;
  }

  function formatarRG(rg) {
    rg = rg.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    rg = rg.replace(/(\d{1})(\d{3})(\d{3})$/, '$1.$2.$3'); // Formatação do RG
    return rg;
  }

  function formatarTelefone(telefone) {
    telefone = telefone.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3'); // Formatação do telefone
    return telefone;
  }
</script>

<!--excluir confirmando -->

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Adicionar um evento de clique a todos os links com a classe 'excluir-cliente'
    const excluirLinks = document.querySelectorAll('.excluir-cliente');
    const nomeClienteExclusao = document.getElementById('nomeClienteExclusao');
    const confirmarExclusao = document.getElementById('confirmarExclusao');

    excluirLinks.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault(); // Evita que o link seja seguido

        const clienteID = this.getAttribute('data-id'); // Obtém o ID do funcionário
        const nomeCliente = this.getAttribute('data-nome'); // Obtém o nome do funcionário

        nomeClienteExclusao.textContent = nomeCliente; // Atualiza o nome na modal

        // Adiciona um evento de clique ao botão 'Confirmar Exclusão'
        confirmarExclusao.addEventListener('click', function() {
          // Redireciona para a página de exclusão com o ID do funcionário
          window.location.href = `index.php?acao=clientes&excluir=${clienteID}`;
        });

        // Abre a modal de confirmação
        $('#confirmacaoExclusao').modal('show');
      });
    });
  });
</script>






<script>
  $(document).ready(function() {
    // Função para preencher a modal de edição com informações do funcionário
    $(".editar-cliente").on("click", function() {
      var cliente = $(this).data("info");
      $("#editNome").val(cliente.nome);
      // Preencha outros campos de edição aqui
    });

    // Função para enviar os dados de edição para o servidor
    $("#salvarEdicao").on("click", function() {
      var dadosEdicao = $("#formEditarCliente").serialize();
      $.ajax({
        type: "POST",
        url: "editar_cliente.php", // Substitua pelo seu arquivo de edição PHP
        data: dadosEdicao,
        success: function(response) {
          if (response === "success") {
            // Atualização bem-sucedida
            alert("Funcionário atualizado com sucesso.");
            location.reload(); // Recarregue a página para exibir as alterações
          } else {
            // Trate os erros aqui
            alert("Ocorreu um erro ao atualizar o cliente.");
          }
        },
      });
    });
  });
</script>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    const editarLinks = document.querySelectorAll('.editar-Cliente');
    const nomeClienteEditar = document.getElementById('nomeClienteEditar');
    const cpfClienteEditar = document.getElementById('cpfCliente'); // Campo CPF
    const cidadeClienteEditar = document.getElementById('cidadeClienteEditar');
    const enderecoClienteEditar = document.getElementById('enderecoClienteEditar');
    const cepClienteEditar = document.getElementById('cepClienteEditar');
    const emailClienteEditar = document.getElementById('emailClienteEditar');
    const telefoneClienteEditar = document.getElementById('telefoneClienteEditar');
    // Outros campos de edição...

    editarLinks.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault();

        // Obtenha as informações do funcionário a partir do atributo 'data-info'
        const infoCliente = JSON.parse(this.getAttribute('data-info'));

        // Preencha os campos da modal com as informações do funcionário
        idClienteEditar.value = infoCliente.id;
        nomeClienteEditar.value = infoCliente.nome;
        cpfClienteEditar.value = infoCliente.cpf;
        cidadeClienteEditar.value = infoCliente.cidade;
        enderecoClienteEditar.value = infoCliente.endereco;
        cepClienteEditar.value = infoCliente.cep;
        emailClienteEditar.value = infoCliente.email;
        telefoneClienteEditar.value = infoCliente.telefone;

        // Preencha outros campos de edição conforme necessário

        // Abra a modal de edição
        $('#editarClienteModal').modal('show');
      });
    });

    // Resto do seu código JavaScript...
  });
</script>


<script>
  var search = document.getElementById('searchInput');

  search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      searchDate();
    }
  });




  function searchDate() {
    window.location = 'index.php?acao=clientes&search=' + search.value;
  }
</script>