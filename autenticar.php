<?php
require_once('conexao.php');

// Verifica se o formulário de login foi submetido

    $username = $_POST['email'];
    $password = $_POST['senha'];

    // Consulta SQL para verificar as credenciais do usuário
    $query = "SELECT * FROM funcionarios WHERE Email = '$username' AND Senha = '$password'";
    $result = $conexao->query($query);

    // Verifica se o usuário foi encontrado no banco de dados
    if ($result->num_rows > 0 &&  < 2 ) {
        // Login bem-sucedido
        echo 'Login bem-sucedido';
    } else {
        // Credenciais inválidas
        echo 'Credenciais inválidas';
    }

?>