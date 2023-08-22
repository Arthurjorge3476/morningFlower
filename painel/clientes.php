<?php

$listaClientes = select('clientes');



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
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($listaClientes as $indice => $linha) { ?>

<tr class="">
        <th scope="row"><?php echo $indice +1; ?></th>
        <td><?php echo $linha['codigo']; ?></td>
        <td><?php echo $linha['nome']; ?></td>
        <td>
          <button type="submit" class="btn btn-cadastro">editar</button>
          <button type="submit" class="btn btn-danger" name="excluir">excluir</button>
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
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Clientes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="cadastro" method="POST" action="index.php">
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="codigocliente">Código</label>
                <input type="text" class="form-control" id="codigodocliente" name="codigo">
              </div>

              <div class="form-group col-md-12">
                <label for="nomedocliente">Nome</label>
                <input type="text" class="form-control" id="nomedocliente" name="nome">
              </div>

             

              <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="cadastrarClientes">Cadastrar</button>
        </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
