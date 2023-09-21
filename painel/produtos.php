<?php

$listaProdutos = select('produtos');
$listaFornecedores = select('fornecedores');




if (isset($_POST['btnEditar'])) {


  $imagens = $_FILES['imagem'];


  $imagensNova = explode('.', $imagens['name']);

  if ($imagensNova[sizeof($imagensNova) - 1] != 'jpg') {
    die('Você não pode fazer upload desse tipo de arquivo');
  } else {
    echo 'Upload foi feito com sucesso!';
    move_uploaded_file($imagens['tmp_name'], '../uploads/' . $imagens['name']);
  }

  // Certifique-se de definir $id com o ID do funcionário que está sendo editado
  $id = $_POST['idprodutosEditar'];

  $conexao = conectar();

  $codigo = $_POST['codigo'];
  $produto = $_POST['produto'];
  $categoria = $_POST['categoria'];
  $fornecedor = $_POST['fornecedor'];
  $precodecompra = $_POST['precodecompra'];
  $precodevenda = $_POST['precodevenda'];
  $estoque = $_POST['estoque'];
  $validade = $_POST['validade'];
  $observacao = $_POST['observacao'];
  $imagem = $_FILES['imagem']['name'];
  // Atualize o funcionário no banco de dados
  $sql_update = "UPDATE produtos SET codigo = :codigo, produto = :produto, categoria = :categoria, fornecedor = :fornecedor, precodecompra = :precodecompra, precodevenda = :precodevenda, estoque = :estoque, validade = :validade, observacao = :observacao,imagem = :imagem WHERE id = :id";

  $stmt_update = $conexao->prepare($sql_update);

  $stmt_update->bindParam(':id', $id);
  $stmt_update->bindParam(':codigo', $codigo);
  $stmt_update->bindParam(':produto', $produto);
  $stmt_update->bindParam(':categoria', $categoria);
  $stmt_update->bindParam(':fornecedor', $fornecedor);
  $stmt_update->bindParam(':precodecompra', $precodecompra);
  $stmt_update->bindParam(':precodevenda', $precodevenda);
  $stmt_update->bindParam(':estoque', $estoque);
  $stmt_update->bindParam(':validade', $validade);
  $stmt_update->bindParam(':observacao', $observacao);
  $stmt_update->bindParam(':imagem', $imagem);


  $result_update = $stmt_update->execute();

  if (!$result_update) {
    var_dump($stmt_update->errorInfo());
    exit;
  } else {
    echo $stmt_update->rowCount() . " Linha atualizada";
    header("Location: index.php?acao=produtos");
    exit;
  }
}


if (isset($_GET['excluir'])) {
  $idParaExcluir = $_GET['excluir'];
  deletar('produtos', $idParaExcluir);

  // Redirecionar para a página após a exclusão
  header("Location: index.php?acao=produtos");
  exit; // Certifique-se de sair do script após o redirecionamento
}

if (isset($_POST['pesquisar'])) {
  $termoPesquisa = $_POST['pesquisar'];
  $listaProdutos = array_filter($listaProdutos, function ($produtos) use ($termoPesquisa) {
    // Aqui, você pode ajustar como deseja que a pesquisa seja realizada.
    // Atualmente, ela é case-insensitive e verifica se o nome contém o termo de pesquisa.
    return stripos($produtos['produto'], $termoPesquisa) !== false;
  });
}
?>

<form method="POST" action="index.php?acao=produtos">
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
  <table class="table table-bordered table-hover mt-3">
    <thead class="table-dark cordatabela">

      <tr>
        <th scope="col"></th>
        <th scope="col">Código</th>
        <th scope="col">Produto</th>
        <th scope="col">Fornecedor</th>
        <th scope="col">Preço de compra</th>
        <th scope="col">Imagem do Produto</th>
        <th scope="col"> </th>
        <th scope="col"> </th>

      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($listaProdutos as $indice => $linha) { ?>

        <tr class="">
          <th scope="row"><?php echo $indice + 1; ?></th>
          <td><?php echo $linha['codigo']; ?></td>
          <td><?php echo $linha['produto']; ?></td>
          <td><?php echo $linha['fornecedor']; ?></td>
          <td><?php echo $linha['precodecompra']; ?></td>
          <td>
            <img src="<?php echo $linha['imagem']; ?>" width="75" height="75" />
          </td>
          <td>
            <a href="index.php?acao=produtos&editar=<?php echo $linha['id']; ?>" class="btn btn-outline-warning btn-sm editar-produtos" data-info='<?php echo json_encode($linha); ?>' data-toggle="modal" data-target="#editarprodutosModal" name="editar">Editar</a>

            <div class="modal fade " id="editarprodutosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="cadastro" method="POST" action="index.php?acao=produtos" enctype="multipart/form-data">
                      <input type="hidden" id="idprodutosEditar" name="idprodutosEditar">
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <label for="codigodoprodutos">Código*</label>
                          <input type="text" class="form-control" id="codigodoprodutos" name="codigo" required>
                        </div>

                        <div class="form-group col-md-12">
                          <label for="produtos">Produto*</label>
                          <input type="text" class="form-control" id="produtos" name="produto" required>
                        </div>

                        <div class="form-group col-md-6">
                          <label for="categoria">Categoria</label>
                          <input type="texto" class="form-control" id="categoria" name="categoria">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="fornecedor">Fornecedor*</label>
                          <select class="form-control" aria-label=".form-select-lg example" id="fornecedor" name="fornecedor" style="border-radius: 18px; font-size: 19px;" required>
                            <option value="">Selecione um fornecedor</option>
                              <?php foreach ($listaFornecedores as $fornecedor) : ?>
                                  <option value="<?php echo $fornecedor['nome']; ?>"><?php echo $fornecedor['nome']; ?></option>
                              <?php endforeach; ?>
                          </select>

                        </div>

                        <div class="form-group col-md-3">
                          <label for="precodecompra">Preço de Compra</label>
                          <input type="texto" class="form-control" id="precodecompra" name="precodecompra">
                        </div>

                        <div class="form-group col-md-3">
                          <label for="venda">Preço de Venda*</label>
                          <input type="text" class="form-control" id="venda" name="precodevenda" required>
                        </div>


                        <div class="form-group col-md-3">
                          <label for="estoque">Quantidade*</label>
                          <input type="texto" class="form-control" id="estoque" name="estoque" required>
                        </div>

                        <div class="form-group col-md-3">
                          <label for="validade">Validade</label>

                          <input type="date" class="form-control" id="validade" name="validade">

                        </div>

                        <div class="form-group col-md-6" style="margin-top: 3px;border-radius: 20px;font-size: 17px;">
                          <label>Imagem do Produto</label>
                          <input type="file" name="imagem" id="imagem" accept="image/*">
                        </div>

                        <div class="form-group col-md-12">
                          <label for="inputobs">Observação do Produto:</label>
                          <textarea id="produtossalvos" name="observacao" class="form-control" rows="8" cols="50"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <input type="submit" for="formEditarprodutos" name="btnEditar" class="btn btn-primary">

                        </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>


          </td>
          <td><a href="index.php?acao=produtos&excluir" class="btn btn-outline-danger btn-sm excluir-produtos" data-id="<?php echo $linha['id']; ?>" data-codigo="<?php echo $linha['produto']; ?>">excluir</a></td>

          <!-- Modal de confirmação de exclusão personalizada -->
          <div class="modal fade" id="confirmacaoExclusao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Exclusão de Produtos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Você deseja excluir o funcionário <span id="codigoprodutosExclusao"></span>?
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
<div class="tabela">
  <!--modal de cadastro para produtos -->



  <script>
    function funcao1() {
      alert("Você tem certeza?");
    }
  </script>

  <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Produto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="cadastro" method="POST" action="index.php?acao=produtos" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="codigodoprodutos">Código*</label>
                <input type="text" class="form-control" id="codigodoprodutos" name="codigo" required>
              </div>

              <div class="form-group col-md-12">
                <label for="produtos">Produto*</label>
                <input type="text" class="form-control" id="produtos" name="produto" required>
              </div>

              <div class="form-group col-md-6">
                <label for="categoria">Categoria</label>
                <input type="texto" class="form-control" id="categoria" name="categoria">
              </div>

              <div class="form-group col-md-6">
                <label for="fornecedor">Fornecedor*</label>
                <select class="form-control" aria-label=".form-select-lg example" id="fornecedor" name="fornecedor" style="border-radius: 18px; font-size: 19px;" required>
                  <option value="">Selecione um fornecedor</option>
                  <?php foreach ($listaFornecedores as $fornecedor) : ?>
                      <option value="<?php echo $fornecedor['nome']; ?>"><?php echo $fornecedor['nome']; ?></option>
                  <?php endforeach; ?>
              </select>

              </div>

              <div class="form-group col-md-3">
                <label for="precodecompra">Preço de Compra</label>
                <input type="texto" class="form-control" id="precodecompra" name="precodecompra">
              </div>

              <div class="form-group col-md-3">
                <label for="venda">Preço de Venda*</label>
                <input type="text" class="form-control" id="venda" name="precodevenda" required>
              </div>

              <div class="form-group col-md-3">
                <label for="estoque">Quantidade*</label>
                <input type="texto" class="form-control" id="estoque" name="estoque" required>
              </div>

              <div class="form-group col-md-3">
                <label for="validade">Validade</label>

                <input type="date" class="form-control" id="validade" name="validade">

              </div>

              <div class="form-group col-md-6" style="margin-top: 3px;border-radius: 20px;font-size: 17px;">
                <label>Imagem do Produto</label>
                <input type="file" name="imagem" id="imagem" accept="image/*">
              </div>

              <div class="form-group col-md-12">
                <label for="inputobs">Observação do Produto:</label>
                <textarea id="produtossalvos" name="observacao" class="form-control" rows="8" cols="50"></textarea>
              </div>



              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="cadastrarProdutos">Cadastrar</button>
              </div>
          </form>
        </div>

      </div>
    </div>
  </div>



  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Adicionar um evento de clique a todos os links com a classe 'excluir-funcionario'
      const excluirLinks = document.querySelectorAll('.excluir-produtos');
      const codigoprodutosExclusao = document.getElementById('codigoprodutosExclusao');
      const confirmarExclusao = document.getElementById('confirmarExclusao');

      excluirLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
          event.preventDefault(); // Evita que o link seja seguido

          const produtosID = this.getAttribute('data-id'); // Obtém o ID do funcionário
          const codigoprodutos = this.getAttribute('data-codigo'); // Obtém o nome do funcionário

          codigoprodutosExclusao.textContent = codigoprodutos; // Atualiza o nome na modal

          // Adiciona um evento de clique ao botão 'Confirmar Exclusão'
          confirmarExclusao.addEventListener('click', function() {
            // Redireciona para a página de exclusão com o ID do funcionário
            window.location.href = `index.php?acao=produtos&excluir=${produtosID}`;
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
      $(".editar-produtos").on("click", function() {
        var produtos = $(this).data("info");
        $("#editNome").val(produtos.codigo);
        // Preencha outros campos de edição aqui
      });

      // Função para enviar os dados de edição para o servidor
      $("#salvarEdicao").on("click", function() {
        var dadosEdicao = $("#formEditarprodutos").serialize();
        $.ajax({
          type: "POST",
          url: "editar_produtos.php", // Substitua pelo seu arquivo de edição PHP
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
      const editarLinks = document.querySelectorAll('.editar-produtos');
      const idprodutosEditar = document.getElementById('idprodutosEditar');
      const codigodoprodutos = document.getElementById('codigodoprodutos');
      const produtos = document.getElementById('produtos'); // Campo CPF
      const categoria = document.getElementById('categoria');
      const fornecedor = document.getElementById('fornecedor');
      const precodecompra = document.getElementById('precodecompra');
      const venda = document.getElementById('venda');
      const estoque = document.getElementById('estoque');
      const validade = document.getElementById('validade');
      const produtossalvos = document.getElementById('produtossalvos');
      // Outros campos de edição...

      editarLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
          event.preventDefault();

          // Obtenha as informações do funcionário a partir do atributo 'data-info'
          const infoprodutos = JSON.parse(this.getAttribute('data-info'));

          // Preencha os campos da modal com as informações do funcionário
          idprodutosEditar.value = infoprodutos.id;
          codigodoprodutos.value = infoprodutos.codigo;
          produtos.value = infoprodutos.produto;
          categoria.value = infoprodutos.categoria;
          fornecedor.value = infoprodutos.fornecedor;
          precodecompra.value = infoprodutos.precodecompra;
          venda.value = infoprodutos.precodevenda;
          estoque.value = infoprodutos.estoque;
          validade.value = infoprodutos.validade;
          produtossalvos.value = infoprodutos.observacao;
          // Preencha outros campos de edição conforme necessário

          // Abra a modal de edição
          $('#editarprodutosModal').modal('show');
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
      window.location = 'index.php?acao=fornecedores&search=' + search.value;
    }
  </script>