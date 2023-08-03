<!DOCTYPE html>
<html>
<head>
    <title>Comprovante Fiscal</title>
    <style>
        /* Estilos CSS para formatar o comprovante */
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
        <h2>Comprovante Fiscal</h2>
        <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
        <p><strong>Nome do cliente:</strong> <?php echo $_POST['nome_cliente']; ?></p>
        <p><strong>CPF/CNPJ do cliente:</strong> <?php echo $_POST['cpf_cnpj_cliente']; ?></p>
        <p><strong>Descrição do produto:</strong> <?php echo $_POST['descricao_produto']; ?></p>
        <?php
            // Remova o caractere "R$" e quaisquer espaços antes de converter o valor para float
            $valor = floatval(str_replace(['R$', ' '], '', $_POST['valor']));
        ?>
        <p><strong>Valor:</strong> R$ <?php echo number_format($valor, 2, ',', '.'); ?></p>
    </div>
</body>
</html>
