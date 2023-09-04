
<?php
$listaPedido = select('pedido');
?>


        
        <form class="cadastro" method="POST" action="comprovante_fiscal.php" style="background-color: white;justify-content: center;width: 100%;  margin: auto;max-width: 1200px; padding: 5px;margin-bottom: 20px;  border-radius: 10px ;">
        <div class="modal-header ">
          <h5 class="modal-title" id="exampleModalLongTitle">Comprovante</h5>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nomeCliente">Nome</label>
                <input type="text" class="form-control" name="cliente" required>
            </div>
            <div class="form-group col-md-6">
                <label for="telefoneCliente">Telefone</label>
                <input type="text" class="form-control" name="telefone" required>
            </div>
            <div class="form-group col-md-4">
                <label for="cidadeCliente">Cidade</label>
                <input type="text" class="form-control" name="cidade" required>
            </div>
            <div class="form-group col-md-4">
                <label for="enderecoCliente">Endereço</label>
                <input type="text" class="form-control" name="endereco" required>
            </div>
            <div class="form-group col-md-4">
                <label for="cepCliente">CEP</label>
                <input type="text" class="form-control" name="cep" required>
            </div>
            <div class="form-group col-md-6">
                <label for="nomeVendedor">Vendedor</label>
                <input type="text" class="form-control" name="vendedor" required>
            </div>
            <div class="form-group col-md-6">
            <label for="produto_retirado">Produtos Retirados</label>
            <div class="row product-row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="produto_retirado[]" placeholder="Nome do Produto" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="quantidade_retirada[]" placeholder="Quantidade" required>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="valor[]" placeholder="Valor" required>
                </div>
            </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-add-product").click(function() {
                var productRow = '<div class="row product-row">' +
                                    '<div class="col-md-6">' +
                                        '<input type="text" class="form-control" name="produto_retirado[]" placeholder="Nome do Produto" required>' +
                                    '</div>' +
                                    '<div class="col-md-3">' +
                                        '<input type="text" class="form-control" name="quantidade_retirada[]" placeholder="Quantidade" required>' +
                                    '</div>' +
                                    '<div class="col-md-3">' +
                                        '<input type="text" class="form-control" name="valor[]" placeholder="Valor" required>' +
                                    '</div>' +
                                '</div>';
                $(".product-row:last").after(productRow);
            });
        });
    </script>


                <div>
                    <button type="button" class="btn btn-secondary btn-add-product">Adicionar Produto</button>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="cadastrarPedido" value="Gerar Comprovante">
                </div>





