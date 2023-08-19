<!DOCTYPE html>
<html>
<head>

<?php 

$listaProdutos = select ('produtos');

?>

    <title>Formulário Comprovante Fiscal</title>
    <!--
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
        }
    </style>
    -->
</head>
<body>

<!--
    <h1>Formulário Comprovante Fiscal</h1>
    <form action="comprovante_fiscal.php" method="post">
        <label for="nome_cliente">Nome do cliente:</label>
        <input type="text" name="nome_cliente" required>
        <br>
        <label for="cpf_cnpj_cliente">CPF:</label>
        <input type="text" name="cpf_cnpj_cliente" required>
        <br>
        <label for="produto_retirado">Produto:</label>
        <input type="text" name="produto_retirado" required>
        <br>
        <label for="valor">Valor:</label>
        <input type="text" name="valor" required>
        <br>
        <label for="valor">Quantidade:</label>
        <input type="text" name="Quantidade_retirada" required>
        <br>
        <input type="submit" value="Gerar Comprovante">
    </form>
 >
    -->
    <form class="cadastro"  method="POST" action="comprovante_fiscal.php">
    <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-9">
                <label for="nomeFuncionario">Nome</label>
                <input type="text" class="form-control" name="nome_cliente" required>
              </div>
              <div class="form-group col-md-4">
                <label for="cpfFuncionario">CPF*</label>
                <input type="text" class="form-control" name="cpf_cnpj_cliente" required>
              </div>
            
              <div class="form-group col-md-4">
                <label for="cidadeFuncionario">Cidade</label>
                <input type="text" class="form-control" name="cidade" required>
              </div>
              <div class="form-group col-md-4">
                <label for="enderecoFuncionario">Endereço</label>
                <input type="text" class="form-control" name="endereco" required>
              </div>
              <div class="form-group col-md-4">
                <label for="cepFuncionario">CEP</label>
                <input type="text" class="form-control"  name="cep" required>
              </div>
              <div class="form-group col-md-4">
                <label for="telefoneFuncionario">Telefone</label>
                <input type="text" class="form-control" name="telefone" required>
              </div>
              <div class="form-group col-md-4">
                <label for="emailFuncionario">Produto Retirado</label>
                <input type="text" class="form-control" name="produto_retirado" required>
              </div>
              <div class="form-group col-md-4">
                <label for="senhaFuncionario">Quantidade Retirada</label>
                <input type="text" class="form-control"  name="Quantidade_retirada" required>
              </div>
              <div class="form-group col-md-4">
                <label for="ctpsFuncionario">Valor</label>
                <input type="text" class="form-control"  name="valor" required>
              </div>
             
              <div class="modal-footer">
              <input type="submit" value="Gerar Comprovante">
                  
              </div>
    
          </form>
          </div>
 


</html>