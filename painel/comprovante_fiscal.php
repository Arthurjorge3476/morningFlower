<?php 
include_once("../consultaSQL.php");
$listaProdutos = select('produtos');
if(isset($_POST['cadastrarPedido'])){
    // COLETAR DADOS PARA O PEDIDO

    $dataAtual = date("d/m/Y"); 
    $dataAtualMySQL = date("Y-m-d");
    $nomeCliente = $_POST['cliente'];
    $produtosRetirados = $_POST["produto_retirado"];
    $quantidadesRetiradas = $_POST["quantidade_retirada"];

    $valorTotal = 0;

    $conexao = conectar();

    $sql = "INSERT INTO pedido (data, cliente, valorTotal) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$dataAtualMySQL, $nomeCliente, $valorTotal]);

    $pedidoId = $conexao->lastInsertId();

    for ($i = 0; $i < count($produtosRetirados); $i++) {
        $produtoRetirado = $produtosRetirados[$i];
        $quantidadeRetirada = $quantidadesRetiradas[$i];

        $sqlPrecoProduto = "SELECT precodevenda FROM produtos WHERE produto = ?";
        $stmtPrecoProduto = $conexao->prepare($sqlPrecoProduto);
        $stmtPrecoProduto->execute([$produtoRetirado]);
        $precoProduto = $stmtPrecoProduto->fetchColumn();

        if ($precoProduto !== false) {
            $valorTotalItem = $quantidadeRetirada * $precoProduto;
            $valorTotal += $valorTotalItem;

            $sql = "INSERT INTO itens_pedido (pedido_id, produto, quantidade, preco_unitario) VALUES (?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->execute([$pedidoId, $produtoRetirado, $quantidadeRetirada, $precoProduto]);

            $sql = "UPDATE pedido SET valorTotal = ? WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->execute([$valorTotal, $pedidoId]);
        } else {
            echo "Preço do produto não encontrado para: $produtoRetirado";
        }
    }

    // COLETAR DADOS COMPROVANTE

    $quantidadeTotal = array_sum($quantidadesRetiradas);

    $sqlComprovante = "INSERT INTO comprovante (pedido, quantidade) VALUES (?, ?)";
    $stmtComprovante = $conexao->prepare($sqlComprovante);
    $stmtComprovante->execute([$pedidoId, $quantidadeTotal]);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Comprovante Fiscal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .comprovante {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        h2 {
            color: #333;
            font-size: 24px;
        }

        p {
            margin: 10px 0;
        }

        strong {
            font-weight: bold;
        }

        span {
            font-weight: normal;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 10px 0;
        }

        input[type="button"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="button"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="comprovante">
        <h2>Comprovante de Venda</h2>
        <?php
        date_default_timezone_set('America/Sao_Paulo');
        echo "<p><strong>Data e Hora:</strong> " . date('d/m/Y H:i:s') . "</p>"; ?>
        <p><strong>Nome do cliente:</strong> <?php echo $_POST['cliente']; ?></p>
        <p><strong>Cidade:</strong> <?php echo $_POST['cidade']; ?></p>
        <p><strong>Endereço:</strong> <?php echo $_POST['endereco']; ?></p>
        <p><strong>Cep:</strong> <?php echo $_POST['cep']; ?></p>
        <p><strong>Telefone:</strong> <?php echo $_POST['telefone']; ?></p>
        

        <?php
        $valorTotal = 0;

        if (isset($_POST['produto_retirado']) && is_array($_POST['produto_retirado'])) {
            for ($i = 0; $i < count($_POST['produto_retirado']); $i++) {
                $produto = $_POST['produto_retirado'][$i];
                $quantidade = intval($_POST['quantidade_retirada'][$i]);
        
                $sqlPrecoProduto = "SELECT precodevenda FROM produtos WHERE produto = ?";
                $stmtPrecoProduto = $conexao->prepare($sqlPrecoProduto);
                $stmtPrecoProduto->execute([$produto]);
                $precoProduto = $stmtPrecoProduto->fetchColumn();
        
                $totalProduto = $precoProduto * $quantidade;
        
                echo "<p><strong>Produto retirado:</strong> <span>$produto</span></p>";
                echo "<p><strong>Valor Unitário:</strong> <span>R$ " . number_format($precoProduto, 2, ',', '.') . "</span></p>";
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