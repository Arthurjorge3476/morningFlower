<?php

$listaFuncionarios = select('funcionarios');



if (isset($_POST['btnEditar'])) {
  // Certifique-se de definir $id com o ID do funcionário que está sendo editado
  $id = $_POST['idFuncionarioEditar'];

  $conexao = conectar();

  $nome = $_POST['nome'];
  $data_de_nascimento = $_POST['data_de_nascimento'];
  $rg = $_POST['rg'];
  $cpf = $_POST['cpf'];
  $ctps = $_POST['ctps'];
  $cidade = $_POST['cidade'];
  $endereco = $_POST['endereco'];
  $cep = $_POST['cep'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $senha = md5($_POST['senha']);
  $grupo_de_acesso = $_POST['grupo_de_acesso'];

  // Atualize o funcionário no banco de dados
  $sql_update = "UPDATE funcionarios SET nome = :nome, data_de_nascimento = :data_de_nascimento, rg = :rg, cpf = :cpf, ctps = :ctps, cidade = :cidade, endereco = :endereco, cep = :cep, email = :email, telefone = :telefone, senha = :senha, grupo_de_acesso = :grupo_de_acesso WHERE id = :id";

  $stmt_update = $conexao->prepare($sql_update);

  $stmt_update->bindParam(':id', $id);
  $stmt_update->bindParam(':nome', $nome);
  $stmt_update->bindParam(':data_de_nascimento', $data_de_nascimento);
  $stmt_update->bindParam(':rg', $rg);
  $stmt_update->bindParam(':cpf', $cpf);
  $stmt_update->bindParam(':ctps', $ctps);
  $stmt_update->bindParam(':cidade', $cidade);
  $stmt_update->bindParam(':endereco', $endereco);
  $stmt_update->bindParam(':cep', $cep);
  $stmt_update->bindParam(':email', $email);
  $stmt_update->bindParam(':telefone', $telefone);
  $stmt_update->bindParam(':senha', $senha);
  $stmt_update->bindParam(':grupo_de_acesso', $grupo_de_acesso);

  $result_update = $stmt_update->execute();

  if (!$result_update) {
    var_dump($stmt_update->errorInfo());
    exit;
  } else {
    echo $stmt_update->rowCount() . " Linha atualizada";
    header("Location: index.php?acao=funcionarios");
    exit;
  }
}




if (isset($_GET['excluir'])) {
  $idParaExcluir = $_GET['excluir'];
  deletar('funcionarios', $idParaExcluir);

  // Redirecionar para a página após a exclusão
  header("Location: index.php?acao=funcionarios");
  exit; // Certifique-se de sair do script após o redirecionamento
}


if (isset($_POST['pesquisar'])) {
  $termoPesquisa = $_POST['pesquisar'];
  $listaFuncionarios = array_filter($listaFuncionarios, function ($funcionario) use ($termoPesquisa) {
    // Aqui, você pode ajustar como deseja que a pesquisa seja realizada.
    // Atualmente, ela é case-insensitive e verifica se o nome contém o termo de pesquisa.
    return stripos($funcionario['nome'], $termoPesquisa) !== false;
  });
}


?>

<form method="POST" action="index.php?acao=funcionarios">
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
        <th scope="col">Telefone</th>
        <th scope="col">CTPS</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php

      foreach ($listaFuncionarios as $indice => $linha) { ?>

        <tr class="">
          <th scope="row"><?php echo $indice + 1; ?></th>

          <td><?php echo $linha['nome']; ?></td>
          <td><?php echo $linha['cpf']; ?></td>
          <td><?php echo $linha['telefone']; ?></td>
          <td><?php echo $linha['ctps']; ?></td>
          <td>
            <div>
              <a href="index.php?acao=funcionarios&editar=<?php echo $linha['id']; ?>" class="btn btn-outline-warning btn-sm editar-funcionario" data-info='<?php echo json_encode($linha); ?>' data-toggle="modal" data-target="#editarFuncionarioModal" name="editar">Editar</a>





              <div class="modal fade" id="editarFuncionarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Editar Funcionário</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulário de Edição de Funcionário -->
                      <form id="formEditarFuncionario" method="POST" action="index.php?acao=funcionarios">
                        <!-- Campos de edição de funcionário -->
                        <input type="hidden" id="idFuncionarioEditar" name="idFuncionarioEditar"  require>
                        <div class="form-row">
                          <div class="form-group col-md-9">
                            <label for="nomeFuncionarioEditar">Nome*</label>
                            <input type="text" class="form-control" id="nomeFuncionarioEditar" name="nome" required>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="datadenascimentoEditar">Data de Nascimento</label>
                            <input type="date" class="form-control" id="datadenascimentoEditar" name="data_de_nascimento"  require>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="rgdoFuncionarioEditar">RG</label>
                            <input type="text" class="form-control" id="rgdoFuncionarioEditar" name="rg" oninput="this.value = formatarRG(this.value);" maxlength="9"  require>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="cpfFuncionario">CPF*</label>
                            <input type="text" class="form-control" id="cpfFuncionario" name="cpf" oninput="this.value = formatarCPF(this.value);" maxlength="14" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="ctpsFuncionarioEditar">CTPS</label>
                            <input type="text" class="form-control" id="ctpsFuncionarioEditar" name="ctps" oninput="this.value = formatarCTPS(this.value);"  require>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="cidadeFuncionarioEditar">Cidade</label>
                            <input type="text" class="form-control" id="cidadeFuncionarioEditar" name="cidade" oninput="this.value = formatarCidade(this.value);"  require>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="enderecoFuncionarioEditar">Endereço</label>
                            <input type="text" class="form-control" id="enderecoFuncionarioEditar" name="endereco" oninput="this.value = formatarEndereco(this.value);"  require>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="cepFuncionarioEditar">CEP</label>
                            <input type="text" class="form-control" id="cepFuncionarioEditar" name="cep" oninput="this.value = formatarCEP(this.value);" maxlength="9"  require>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="emailFuncionarioEditar">Email*</label>
                            <input type="e-mail" class="form-control" id="emailFuncionarioEditar" name="email" oninput="this.value = formatarEmail(this.value);" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="telefoneFuncionarioEditar">Telefone*</label>
                            <input type="text" class="form-control" id="telefoneFuncionarioEditar" name="telefone" oninput="this.value = formatarTelefone(this.value);" maxlength="15" required>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="senhaFuncionarioEditar">Senha*</label>
                            <input type="password" class="form-control" id="senhaFuncionarioEditar" name="senha" maxlength="10" oninput="this.value = formatarSenha(this.value);" required>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="grupoFuncionarioEditar">Grupo de Acesso*</label>
                            <input type="text" class="form-control" id="grupoFuncionarioEditar" maxlength="1" name="grupo_de_acesso" oninput="this.value = formatarGrupodeacesso(this.value);" required>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" for="formEditarFuncionario" name="btnEditar" class="btn btn-primary">

                          </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>




          <td><a href="index.php?acao=funcionarios&excluir" class="btn btn-outline-danger btn-sm excluir-funcionario" data-id="<?php echo $linha['id']; ?>" data-nome="<?php echo $linha['nome']; ?>">excluir</a></td>

          <!-- Modal de confirmação de exclusão personalizada -->
          <div class="modal fade" id="confirmacaoExclusao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Exclusão de Funcionário</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Você deseja excluir o funcionário <span id="nomeFuncionarioExclusao"></span>?
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
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Funcionario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="cadastro" method="POST" action="index.php?acao=funcionarios">

          <div class="form-row">
            <div class="form-group col-md-9">
              <label for="nomeFuncionario">Nome*</label>
              <input type="text" class="form-control" id="nomeFuncionario" name="nome" required>
            </div>
            <div class="form-group col-md-3">
              <label for="datadenascimento">Data de Nascimento</label>
              <input type="date" class="form-control" id="datadenascimento" name="data_de_nascimento">
            </div>
            <div class="form-group col-md-4">
              <label for="rgdoFuncionario">RG</label>
              <input type="text" class="form-control" id="rgdofuncionario" name="rg" oninput="this.value = formatarRG(this.value);" maxlength="9">
            </div>
            <div class="form-group col-md-4">
              <label for="cpfFuncionario">CPF*</label>
              <input type="text" class="form-control" id="cpfFuncionario" name="cpf" oninput="this.value = formatarCPF(this.value);" maxlength="14" required>
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
              <input type="text" class="form-control" id="cepFuncionario" name="cep" oninput="this.value = formatarCEP(this.value);" maxlength="9">
            </div>
            <div class="form-group col-md-4">
              <label for="emailFuncionario">Email*</label>
              <input type="e-mail" class="form-control" id="emailFuncionario" name="email" required>
            </div>
            <div class="form-group col-md-4">
              <label for="telefoneFuncionario">Telefone*</label>
              <input type="text" class="form-control" id="telefoneFuncionario" name="telefone" oninput="this.value = formatarTelefone(this.value);" maxlength="15" required>
            </div>
            <div class="form-group col-md-4">
              <label for="senhaFuncionario">Senha*</label>
              <div class="input-group">
                <input type="password" class="form-control" id="senhaFuncionario" name="senha" maxlength="10" required>
                <div class="input-group-append">
                  <button type="button" class="btn btn-outline-secondary" id="mostrarSenha">
                    <i class="fas fa-eye" id="iconeMostrarSenha"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="form-group col-md-3">
              <label for="grupoFuncionario">Grupo de Acesso*</label>
              <input type="text" class="form-control" id="grupoFuncionario" maxlength="1" name="grupo_de_acesso" required>
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
    // Adicionar um evento de clique a todos os links com a classe 'excluir-funcionario'
    const excluirLinks = document.querySelectorAll('.excluir-funcionario');
    const nomeFuncionarioExclusao = document.getElementById('nomeFuncionarioExclusao');
    const confirmarExclusao = document.getElementById('confirmarExclusao');

    excluirLinks.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault(); // Evita que o link seja seguido

        const funcionarioID = this.getAttribute('data-id'); // Obtém o ID do funcionário
        const nomeFuncionario = this.getAttribute('data-nome'); // Obtém o nome do funcionário

        nomeFuncionarioExclusao.textContent = nomeFuncionario; // Atualiza o nome na modal

        // Adiciona um evento de clique ao botão 'Confirmar Exclusão'
        confirmarExclusao.addEventListener('click', function() {
          // Redireciona para a página de exclusão com o ID do funcionário
          window.location.href = `index.php?acao=funcionarios&excluir=${funcionarioID}`;
        });

        // Abre a modal de confirmação
        $('#confirmacaoExclusao').modal('show');
      });
    });
  });
</script>




<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Selecione o campo de senha e o ícone
    const senhaFuncionario = document.getElementById('senhaFuncionario');
    const iconeMostrarSenha = document.getElementById('iconeMostrarSenha');

    // Adicione um evento de clique ao botão
    document.getElementById('mostrarSenha').addEventListener('click', function() {
      if (senhaFuncionario.type === 'password') {
        senhaFuncionario.type = 'text'; // Mostrar senha
        iconeMostrarSenha.classList.remove('fa-eye');
        iconeMostrarSenha.classList.add('fa-eye-slash');
      } else {
        senhaFuncionario.type = 'password'; // Ocultar senha
        iconeMostrarSenha.classList.remove('fa-eye-slash');
        iconeMostrarSenha.classList.add('fa-eye');
      }
    });
  });
</script>




<script>
  $(document).ready(function() {
    // Função para preencher a modal de edição com informações do funcionário
    $(".editar-funcionario").on("click", function() {
      var funcionario = $(this).data("info");
      $("#editNome").val(funcionario.nome);
      // Preencha outros campos de edição aqui
    });

    // Função para enviar os dados de edição para o servidor
    $("#salvarEdicao").on("click", function() {
      var dadosEdicao = $("#formEditarFuncionario").serialize();
      $.ajax({
        type: "POST",
        url: "editar_funcionario.php", // Substitua pelo seu arquivo de edição PHP
        data: dadosEdicao,
        success: function(response) {
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
  document.addEventListener('DOMContentLoaded', function() {
    const editarLinks = document.querySelectorAll('.editar-funcionario');
    const idFuncionarioEditar = document.getElementById('idFuncionarioEditar');
    const nomeFuncionarioEditar = document.getElementById('nomeFuncionarioEditar');
    const cpfFuncionarioEditar = document.getElementById('cpfFuncionario'); // Campo CPF
    const datadenascimentoEditar = document.getElementById('datadenascimentoEditar');
    const rgdoFuncionarioEditar = document.getElementById('rgdoFuncionarioEditar');
    const ctpsFuncionarioEditar = document.getElementById('ctpsFuncionarioEditar');
    const cidadeFuncionarioEditar = document.getElementById('cidadeFuncionarioEditar');
    const enderecoFuncionarioEditar = document.getElementById('enderecoFuncionarioEditar');
    const cepFuncionarioEditar = document.getElementById('cepFuncionarioEditar');
    const emailFuncionarioEditar = document.getElementById('emailFuncionarioEditar');
    const telefoneFuncionarioEditar = document.getElementById('telefoneFuncionarioEditar');
    const senhaFuncionarioEditar = document.getElementById('senhaFuncionarioEditar');
    const grupoFuncionarioEditar = document.getElementById('grupoFuncionarioEditar');
    // Outros campos de edição...

    editarLinks.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault();

        // Obtenha as informações do funcionário a partir do atributo 'data-info'
        const infoFuncionario = JSON.parse(this.getAttribute('data-info'));

        // Preencha os campos da modal com as informações do funcionário
        idFuncionarioEditar.value = infoFuncionario.id;
        nomeFuncionarioEditar.value = infoFuncionario.nome;
        cpfFuncionarioEditar.value = infoFuncionario.cpf;
        datadenascimentoEditar.value = infoFuncionario.data_de_nascimento;
        rgdoFuncionarioEditar.value = infoFuncionario.rg;
        ctpsFuncionarioEditar.value = infoFuncionario.ctps;
        cidadeFuncionarioEditar.value = infoFuncionario.cidade;
        enderecoFuncionarioEditar.value = infoFuncionario.endereco;
        cepFuncionarioEditar.value = infoFuncionario.cep;
        emailFuncionarioEditar.value = infoFuncionario.email;
        telefoneFuncionarioEditar.value = infoFuncionario.telefone;
        senhaFuncionarioEditar.value = infoFuncionario.senha;
        grupoFuncionarioEditar.value = infoFuncionario.grupo_de_acesso;
        // Preencha outros campos de edição conforme necessário

        // Abra a modal de edição
        $('#editarFuncionarioModal').modal('show');
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
    window.location = 'index.php?acao=funcionarios&search=' + search.value;
  }
</script>