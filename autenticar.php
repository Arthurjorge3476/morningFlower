<?php
require('./consultaSQL.php');


$conexao = conectar();

    $username = $_POST['email'];

    $password = md5($_POST['senha']);
   

    // Consulta SQL para verificar as credenciais do usuário
    $query = "SELECT * FROM funcionarios WHERE Email = '$username' AND Senha = '$password'";
    $result = $conexao->query($query);

    // Verifica se o usuário foi encontrado no banco de dados
    if ($result > 0 && $result < 2){
        // Login bem-sucedido
        header ('Location: ./painel/index.php');
    } else {
        // Credenciais inválidas
        echo 'Credenciais inválidas';
    }


?>




//12345688