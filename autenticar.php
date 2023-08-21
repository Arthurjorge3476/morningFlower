<?php
require('./consultaSQL.php');

$conexao = conectar();

$username = $_POST['email'];
$password = $_POST['senha'];

// Consulta SQL para verificar as credenciais do usuário
$query = "SELECT * FROM funcionarios WHERE Email = :username";
$stmt = $conexao->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();

// Verifica se o usuário foi encontrado no banco de dados
if ($stmt->rowCount() == 1) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtenha a senha do banco de dados
    $senha_hash_no_banco_de_dados = $row['senha'];

    // Verifique a senha usando MD5
    $senha_inserida_pelo_usuario_hash = md5($password);

    // Compare as senhas em letras minúsculas
    if (strtolower($senha_inserida_pelo_usuario_hash) === strtolower($senha_hash_no_banco_de_dados)) {
        // Login bem-sucedido
        header('Location: ./painel/index.php');
        exit(); // Certifique-se de sair do script após o redirecionamento
    } else {
        // Credenciais inválidas
        echo 'Credenciais inválidas';
    }
} else {
    // Usuário não encontrado
    echo 'Usuário não encontrado';
}

// Feche a conexão PDO
$conexao = null;

?>