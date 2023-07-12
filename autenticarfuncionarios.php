<?php
require_once('conexao.php');

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$data_de_nascimento = $_POST['data_de_nascimento'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$ctps = $_POST['ctps'];
$cidade = $_POST['cidade'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$grupo_de_acesso = $_POST['grupo_de_acesso'];

try{
// Preparar a consulta SQL para inserção dos dados na tabela
$sql = "INSERT INTO funcionarios (codigo,nome,data_de_nascimento,rg,cpf,ctps,cidade,endereco,cep, email,telefone,senha,grupo_de_acesso) VALUES ('$nome','$data_de_nascimento','$rg','$cpf','$ctps','$cidade','$endereco','$cep','$email','$telefone','$senha','$grupo_de_acesso')";
$stmt = $conn->prepare($sql);



//Executar a consulta SQL com os valores do formulário

$stmt->bindParam(':codigo', $codigo);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':data_de_nascimento', $data_de_nascimento);
$stmt->bindParam(':rg', $rg);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':ctps', $ctps);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':cep', $cep);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':grupo_de_acesso', $grupo_de_acesso);
$stmt->execute();



echo "Dados cadastrados com sucesso!";
}
catch (PDOException $e) {
echo "Erro ao cadastrar os dados: " . $e->getMessage();
}
?>