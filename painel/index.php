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
        } else {
            include('home.php');
        }
    ?>
</div>
</body>

</html>






<!--
// pesquisa
<input type="text" id="termo-pesquisa" placeholder="Digite o termo de pesquisa">
    <button onclick="pesquisar()">Pesquisar</button>
    <ul id="resultado-pesquisa"></ul>

    <script>
        function pesquisar() {
            const termoPesquisa = document.getElementById('termo-pesquisa').value;

            // Faz a requisição AJAX para o servidor PHP
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `/pesquisar.php?termo=${encodeURIComponent(termoPesquisa)}`, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    const resultados = JSON.parse(xhr.responseText);
                    exibirResultados(resultados);
                }
            };
            xhr.send();
        }

        function exibirResultados(resultados) {
            const ulResultado = document.getElementById('resultado-pesquisa');
            ulResultado.innerHTML = '';

            resultados.forEach(resultado => {
                const li = document.createElement('li');
                li.textContent = resultado.nome;
                ulResultado.appendChild(li);
            });
        }
    </script>

    -->