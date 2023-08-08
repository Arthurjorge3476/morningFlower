<!DOCTYPE html>
<html>
<head>

<?php 

$listaProdutos = select ('produtos');

?>

    <title>Formulário Comprovante Fiscal</title>
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
</head>
<body>
    <h1>Formulário Comprovante Fiscal</h1>
    <form action="comprovante_fiscal.php" method="post" target="_blank">
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
        <input type="submit" value="Gerar Comprovante">
    </form>
</body>
</html>
