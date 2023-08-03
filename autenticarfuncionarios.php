<?php

//require_once('conexao.php');
include_once ('consulta.SQL.php');


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



$campos = array('nome', 'data_de_nascimento', 'rg', 'cpf', 'ctps', 'cidade', 'endereco', 'cep', 'email', 'telefone', 'senha', 'grupo_de_acesso');
$valores = array($nome, $data_de_nascimento, $rg, $cpf, $ctps, $cidade, $endereco, $cep, $email, $telefone, $senha, $grupo_de_acesso);

inserir('funcionarios', $campos, $valores);

?>