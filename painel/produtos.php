<?php

$listaProdutos = select ('produtos');


if (isset($_GET['excluir'])) {
  $idParaExcluir = $_GET['excluir'];
  deletar('produtos', $idParaExcluir);

  // Redirecionar para a página após a exclusão
  header("Location: index.php?acao=produtos");
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
      <th scope="col">Produto</th>
      <th scope="col">Fornecedor</th>
      <th scope="col">Estoque</th>
      <th scope="col"> </th>
      <th scope="col"> </th>

    </tr>
  </thead>
  <tbody>
  <?php
      foreach ($listaProdutos as $indice => $linha) { ?>

<tr class="">
        <th scope="row"><?php echo $indice +1; ?></th>
        <td><?php echo $linha['codigo']; ?></td>
        <td><?php echo $linha['produto']; ?></td>
        <td><?php echo $linha['fornecedor']; ?></td>
        <td><?php echo $linha['estoque']; ?></td>
        <td>
          <button type="submit" class="btn btn-cadastro">editar</button>
        </td>
        <td><a href="index.php?acao=produtos&excluir" class="btn btn-outline-danger btn-sm excluir-funcionario" data-id="<?php echo $linha['id']; ?>" data-codigo="<?php echo $linha['codigo']; ?>" >excluir</a></td>

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
                          Você deseja excluir  o funcionário <span id="codigoprodutosExclusao"></span>?
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
        <form class="cadastro" method="POST" action="index.php?acao=produtos">
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="codigodoprodutos">Código</label>
              <input type="text" class="form-control" id="codigodoprodutos" name="codigo">
            </div>

            <div class="form-group col-md-12">
              <label for="produtos">Produto</label>
              <input type="text" class="form-control" id="produtos" name="produto">
            </div>

            <div class="form-group col-md-6">
              <label for="categoria">Categoria</label>
              <input type="texto" class="form-control" id="categoria" name="categoria">
            </div>

            <div class="form-group col-md-6">
              <label for="fornecedor">Fornecedor</label>
              <select class="form-control" aria-label=".form-select-lg example" id="fornecedor" name="fornecedor">
                <option selected> </option>
                <option value="fornecedor">Rodrigo Silva</option>
                <option value="fornecedor">Carlos Daniel</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="precodecompra">Preço de Compra</label>
              <input type="texto" class="form-control" id="precodecompra" name="precodecompra">
            </div>

            <div class="form-group col-md-3">
              <label for="venda">Preço de Venda</label>
              <input type="text" class="form-control" id="venda" name="precodevenda">
            </div>

            <div class="form-group col-md-3">
              <label for="margemdelucro">Margem de lucro[%]</label>
              <input type="texto" class="form-control" id="margemdelucro" name="margemdelucro">
            </div>

            <div class="form-group col-md-3">
              <label for="lucroanterior">Lucro anterior[%]</label>
              <input type="texto" class="form-control" id="lucroanterior" name="lucroanterior">
            </div>

            <div class="form-group col-md-3">
              <label for="estoque">Estoque</label>
              <input type="texto" class="form-control" id="estoque" name="estoque">
            </div>

            <div class="form-group col-md-6">
              <label for="validade">Validade</label>

              <input type="text" class="form-control" id="validade" name="validade">

            </div>

            <div class="form-group col-md-6">
              <form method="post"  enctype="multipart/form-data">
                <input type="file" name="fotodoproduto">
            </div>

            <div class="form-group col-md-6">
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
  document.addEventListener('DOMContentLoaded', function () {
    // Adicionar um evento de clique a todos os links com a classe 'excluir-funcionario'
    const excluirLinks = document.querySelectorAll('.excluir-produtos');
    const codigoprodutosExclusao = document.getElementById('codigoprodutosExclusao');
    const confirmarExclusao = document.getElementById('confirmarExclusao');

    excluirLinks.forEach(function (link) {
      link.addEventListener('click', function (event) {
        event.preventDefault(); // Evita que o link seja seguido

        const produtosID = this.getAttribute('data-id'); // Obtém o ID do funcionário
        const codigoprodutos = this.getAttribute('data-codigo'); // Obtém o nome do funcionário

        codigoprodutosExclusao.textContent = codigoprodutos; // Atualiza o nome na modal

        // Adiciona um evento de clique ao botão 'Confirmar Exclusão'
        confirmarExclusao.addEventListener('click', function () {
          // Redireciona para a página de exclusão com o ID do funcionário
          window.location.href = `index.php?acao=produtos&excluir=${produtosID}`;
        });

        // Abre a modal de confirmação
        $('#confirmacaoExclusao').modal('show');
      });
    });
  });
</script>