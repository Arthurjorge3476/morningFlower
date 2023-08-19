<!DOCTYPE html>
<html>
<head>

    <title>vendas</title>
    <style>
   
        body {
            font-family: Arial, sans-serif;
        }
        .comprovante {
            border: 1px solid #ccc;
            padding: 20px;
            width: 400px;
            margin: 0 auto;
        }
        .comprovante p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="comprovante">
        <h2>Comprovante de Venda</h2>
        <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
        <p><strong>Nome do cliente:</strong> <?php echo $_POST['nome_cliente']; ?></p>
        <p><strong>CPF:</strong> <?php echo $_POST['cpf_cnpj_cliente']; ?></p>
        <p><strong>Produto retirado:</strong> <?php echo $_POST['produto_retirado']; ?></p>
        <p><strong>Quantidade retirada:</strong> <?php echo $_POST['Quantidade_retirada']; ?></p>
        <p><strong>Cidade:</strong> <?php echo $_POST['cidade']; ?></p>
        <p><strong>Endereço:</strong> <?php echo $_POST['endereco']; ?></p>
        <p><strong>Cep:</strong> <?php echo $_POST['cep']; ?></p>
        <p><strong>Telefone:</strong> <?php echo $_POST['telefone']; ?></p>

        <?php
            // Remova o caractere "R$" e quaisquer espaços antes de converter o valor para float
            $valor = floatval(str_replace(['R$', ' '], '', $_POST['valor']));
        ?>
        <p><strong>Valor:</strong> R$ <?php echo number_format($valor, 2, ',', '.'); ?></p>


        <form action="comprovante_fiscal.php" method="post">
       
            
        <input type="submit" value="Gerar Comprovante"  onclick="DoPrinting()">
 

    <script language="JavaScript">
function DoPrinting()
{
   window.print()
}
</script>

</form> 
    </div>
 
</body>
</html>
