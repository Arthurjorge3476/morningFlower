<?php
require_once('conexao.php');

    $username = $_POST['email'];
    $password = $_POST['senha'];

    // Consulta SQL para verificar as credenciais do usuário
    $query = "SELECT * FROM funcionarios WHERE Email = '$username' AND Senha = '$password'";
    $result = $conexao->query($query);

    // Verifica se o usuário foi encontrado no banco de dados
    if ($result > 0 && $result < 2){
        // Login bem-sucedido
        header ('Location: ./painel/home.php');
    } else {
        // Credenciais inválidas
        echo 'Credenciais inválidas';
    }

?>