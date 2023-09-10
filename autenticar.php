<?php
@session_start();
require('./consultaSQL.php');


$username = $_POST['email'];
$password = $_POST['senha'];
$senhacrip = md5($password);

$dados = select('funcionarios',"email='$username' and senha= '$senhacrip'");
    if(count($dados)== 1){
        $_SESSION['nome'] = $dados[0]['nome'];
        header('Location: ./painel/index.php');
        echo "Logou@";
    } else {
        header('Location: index.php');    }
