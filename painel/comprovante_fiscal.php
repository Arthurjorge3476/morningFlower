<!DOCTYPE html>
<html>
<head>
    <title>Comprovante Fiscal</title>
    <style>
        /* Estilos del comprobante aquí... */
    </style>
</head>
<body>
    <div class="comprovante">
        <h2>Comprovante de Venda</h2>
        <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
        <p><strong>Nome do cliente:</strong> <?php echo $_POST['nome_cliente']; ?></p>
        <p><strong>Cidade:</strong> <?php echo $_POST['cidade']; ?></p>
        <p><strong>Endereço:</strong> <?php echo $_POST['endereco']; ?></p>
        <p><strong>Cep:</strong> <?php echo $_POST['cep']; ?></p>
        <p><strong>Telefone:</strong> <?php echo $_POST['telefone']; ?></p>

        <?php
        $valorTotal = 0;
        
        if (isset($_POST['produto_retirado']) && is_array($_POST['produto_retirado'])) {
            for ($i = 0; $i < count($_POST['produto_retirado']); $i++) {
                $produto = $_POST['produto_retirado'][$i];
                $valor = floatval($_POST['valor'][$i]);
                $quantidade = intval($_POST['quantidade_retirada'][$i]);
                $totalProduto = $valor * $quantidade;
                
                echo "<p><strong>Produto retirado:</strong> <span>$produto</span></p>";
                echo "<p><strong>Valor Unitário:</strong> <span>R$ " . number_format($valor, 2, ',', '.') . "</span></p>";
                echo "<p><strong>Quantidade retirada:</strong> <span>$quantidade</span></p>";
                echo "<p><strong>Total do Produto:</strong> <span>R$ " . number_format($totalProduto, 2, ',', '.') . "</span></p>";
                echo "<hr>";
                
                $valorTotal += $totalProduto;
            }
        }
        
        echo "<p><strong>Valor Total:</strong> <span>R$ " . number_format($valorTotal, 2, ',', '.') . "</span></p>";
        ?>
        
        <form action="" method="post">
            <input type="button" value="Imprimir Comprovante" onclick="DoPrinting()">
        </form>

        <script language="JavaScript">
        function DoPrinting() {
            window.print();
        }
        </script>
    </div>
</body>
</html>
