<?php
$filename = 'notepad.txt'; // Nome do arquivo de anotações

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notes = $_POST['notes']; // Obtém as anotações enviadas pelo formulário
    $content = '';

    // Constrói o conteúdo a ser salvo no arquivo
    foreach ($notes as $note) {
        $checked = isset($note['checked']) ? 'checked' : '';
        $content .= ($checked ? '[x]' : '[ ]') . ' ' . $note['content'] . "\n";
    }

    // Salva o conteúdo no arquivo
    file_put_contents($filename, $content);

    echo 'Anotações salvas com sucesso!';
}

// Obtém o conteúdo atual do arquivo, se existir
$content = file_exists($filename) ? file_get_contents($filename) : '';
$notes = array();

// Divide o conteúdo em anotações individuais
if ($content !== '') {
    $lines = explode("\n", $content);
    foreach ($lines as $line) {
        $checked = strpos($line, '[x]') === 0;
        $content = substr($line, 3);
        $notes[] = array('content' => $content, 'checked' => $checked);
    }
}
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo">
                <img src="../img/logo.png.png">
            </div>
            <button class="navbar-toggler mobile-menu" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Presentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="funcionarios.php">Funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produtos.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fornecedores.php">Fornecedores</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="area-login">
        <div id="notepad">
            <h1 class="mt-1">Bloco de Anotações</h1>
            <form method="POST">
                <ul id="notes-list" class="list-unstyled">
                    <?php foreach ($notes as $index => $note): ?>
                        <li class="bloco d-flex align-items-center mb-2">
                            <input type="checkbox" name="notes[<?php echo $index; ?>][checked]" <?php echo $note['checked'] ? 'checked' : ''; ?> class="mr-2">
                            <input type="text" name="notes[<?php echo $index; ?>][content]" value="<?php echo $note['content']; ?>" class="form-control mr-2">
                            <button type="button" class="btn btn-danger delete-note-btn" onclick="deleteNote(this)">X</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="add-note-btn mt-1">
                    <button type="button" class="btn btn-primary" onclick="addNote()"><i>+</i>Adicionar Anotação</button>
                    <button type="submit" name="save-btn" class="btn btn-success">Salvar</button>
                </div>
                <div class="save-note-btn mt-1">
                <button type="submit" name="save-btn" class="btn btn-success">Salvar</button>
                    </div>

            </form>
        </div>
    </div>

    <!-- Add Bootstrap JS (jQuery is required for Bootstrap JS to work) -->
    

    <script>
        function addNote() {
            var notesList = document.getElementById('notes-list');
            var li = document.createElement('li');
            li.className = 'bloco d-flex align-items-center mb-2';
            li.innerHTML = '<input type="checkbox" name="notes[checked][]" value="1" class="mr-2"><input type="text" name="notes[content][]" value="" class="form-control mr-2"><button type="button" class="btn btn-danger delete-note-btn" onclick="deleteNote(this)">X</button>';
            notesList.appendChild(li);
        }

        function deleteNote(button) {
            var li = button.parentNode;
            li.parentNode.removeChild(li);
        }
    </script>

    
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