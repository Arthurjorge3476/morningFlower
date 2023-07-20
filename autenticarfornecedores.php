<?php
require_once('conexao.php');

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$email = $_POST['email'];
$cnpj = $_POST['cnpj'];
$vendedor = $_POST['vendedor'];
$telefonevendedor = $_POST['telefonevendedor1'];
$telefonevendedor2 = $_POST['telefonevendedor2'];
$condicaodavenda = $_POST['condicaodavenda'];
$atividade = $_POST['atividade'];

try{
// Preparar a consulta SQL para inserção dos dados na tabela

$sql = "INSERT INTO funcionarios (codigo, nome,endereco , cidade,bairro , estado, cep, telefone1,telefone2 , email,cnpj,vendedor,telefonevendedor1, telefonevendedor2,condicaodavenda ,atividade ) VALUES ( :codigo, :nome,:endereco , :cidade,:bairro , :estado, :cep, :telefone1,:telefone2 , :email,:cnpj,:vendedor,:telefonevendedor1, :telefonevendedor2,:condicaodavenda ,:atividade )";
$stmt = $conexao->prepare($sql);



//Executar a consulta SQL com os valores do formulário

$stmt->bindParam(':codigo', $codigo);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':bairro',$bairro);
$stmt->bindParam(':estado',$estado);
$stmt->bindParam(':cep', $cep);
$stmt->bindParam(':telefone1',$telefone1 );
$stmt->bindParam(':telefone2',$telefone2);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':cnpj', $cnpj);
$stmt->bindParam(':vendedor', $vendedor);
$stmt->bindParam(':telefonevendedor1', $telefonevendedor1);
$stmt->bindParam(':telefonevendedor2', $telefonevendedor2);
$stmt->bindParam(':condicaodavenda', $condicaodavenda );
$stmt->bindParam(':atividade',$atividade );
$stmt->execute();



echo "Dados cadastrados com sucesso!";
}
catch (PDOException $e) {
echo "Erro ao cadastrar os dados: " . $e->getMessage();
}
?>