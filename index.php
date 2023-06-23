<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/telainicial.css">
    <title>Morning Flower</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    
</head>
<body>
    <section class="area-login" >
        <div class="login">
        <div>
            <img src="img/logo.png.png">
        </div>
        <form method="POST" >
            <input type="text" name="nome" placeholder="Nome de usuario" autofocus >
            <input type="password" name="senha" placeholder="Sua senha">
            <input type="submit" class="botao" value="Entrar">
        </form>
        </div>
    </section>
</body>
</html>

<?php
require_once('conexao.php');

// Verifica se o formulário de login foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar as credenciais do usuário
    $query = "SELECT * FROM funcionarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    // Verifica se o usuário foi encontrado no banco de dados
    if ($result->num_rows > 0) {
        // Login bem-sucedido
        echo 'Login bem-sucedido';
    } else {
        // Credenciais inválidas
        echo 'Credenciais inválidas';
    }
}
?>