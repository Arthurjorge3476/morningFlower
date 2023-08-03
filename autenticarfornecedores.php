<?php
require_once('consulta.SQL.php');

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

$campos = array('nome', 'endereco', 'cidade','bairro','estado','cep','telefone1','telefone2','email','cnpj','vendedor','telefonevendedor1','telefonevendedor2','condicaodavenda','atividade');
$valores = array($nome, $endereco, $cidade,$bairro,$estado,$cep,$teleone1,$teleone2,$email,$cnpj,$vendedor,$teleonevendedor1,$teleonevendedor2,$condicaodavenda,$atividade);

inserir('fornecedores', $campos, $valores);

?>