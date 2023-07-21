<?php
require_once('conexao.php');

$produto = $_POST['produto'];
$categoria = $_POST['categoria'];
$fornecedor = $_POST['fornecedor'];
$precodecusto = $_POST['precodecusto'];
$precodevenda = $_POST['precodevenda'];
$margemdelucro = $_POST['margemdelucro'];
$lucroanterior = $_POST['lucroanterior'];
$estoque = $_POST['estoque'];
$validade = $_POST['validade'];
$observacao = $_POST['observacao'];
$fotodoproduto = $_POST['fotodoproduto'];


try{
// Preparar a consulta SQL para inserção dos dados na tabela

$sql = "INSERT INTO funcionarios ( produto, categoria, fornecedor, precodecusto, precodevenda,margemdelucro ,lucroanterior , estoque, validade, observacao, fotodoproduto) VALUES ( :produto, :categoria, :fornecedor, :precodecusto, :precodevenda,:margemdelucro ,:lucroanterior , :estoque, :validade, :observacao, :fotodoproduto)";
$stmt = $conexao->prepare($sql);



//Executar a consulta SQL com os valores do formulário


$stmt->bindParam(':produto', $produto);
$stmt->bindParam(':categoria', $categoria);
$stmt->bindParam(':fornecedor', $fornecedor);
$stmt->bindParam(':precodecusto', $precodecusto);
$stmt->bindParam(':precodevenda', $precodevenda);
$stmt->bindParam(':margemdelucro', $margemdelucro);
$stmt->bindParam(':lucroanterior', $lucroanterior);
$stmt->bindParam(':estoque', $estoque);
$stmt->bindParam(':validade', $validade);
$stmt->bindParam(':observacao', $observacao);
$stmt->bindParam(':fotodoproduto', $fotodoproduto);
$stmt->execute();



echo "Dados cadastrados com sucesso!";
}
catch (PDOException $e) {
echo "Erro ao cadastrar os dados: " . $e->getMessage();
}
?>