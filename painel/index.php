
<?php

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Morning Flower</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/telainicial.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="login">
    <header class="corpo">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <a class="navbar-brand" href="index.php">Morning Flower</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link " href="index.php">Home <span class="sr-only">(Página atual)</span></a>
                    <a class="nav-item nav-link " href="index.php?acao=presentes">Presentes</a>
                    <a class="nav-item nav-link " href="index.php?acao=funcionarios">Funcionários</a>
                    <a class="nav-item nav-link " href="index.php?acao=produtos">Produtos</a>
                    <a class="nav-item nav-link  " href="index.php?acao=fornecedores">Fornecedores</a>
                    <a class="nav-item nav-link  " href="index.php?acao=formulario_comprovante">Comprovante</a>
                    
                </div>
            </div>
        </nav>
</header>

<div>
    <?php
        if (isset($_GET['acao'])) {
            $acao = $_GET['acao'];
            if($acao == 'presentes') {
                include('presentes.php');
            } elseif ($acao == 'funcionarios') {
                include('funcionarios.php');
            }
            elseif($acao == 'produtos') {
                include('produtos.php');
            }
            elseif($acao == 'fornecedores'){
                include('fornecedores.php');
            }
             elseif($acao == 'comprovante'){
                include('formulario_comprovante.php');
            }
        } else {
            include('home.php');
        }
    ?>
</div>
<h2>Área de Pesquisa</h2>
    <form action="consulta.SQL.php" method="get">
        <label for="pesquisa">Digite sua pesquisa:</label>
        <input type="text" name="pesquisa" id="pesquisa" required>
        <br>
        <input type="submit" value="Pesquisar">
    </form>
    <?php  include('consulta.SQL.php'); 
    
    ?>
</body>

</html>


