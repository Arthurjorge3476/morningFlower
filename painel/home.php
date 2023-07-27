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
    <link rel="stylesheet" href="../css/telainicial.css" />
    
    <style>
        #notepad {
            background-image:url('../img/folha_de_caderno.avif');
            background-repeat: no-repeat;
            width: 355px;
            height: 320px;
            padding: 35px;
            display: flex;
            flex-direction: column;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-size: cover;
            font-family: 'Helvetica', sans-serif;
            justify-content: center;
            align-items: center;
            margin: 20px;
            line-height: 1.0;
            overflow: auto;
        }

        li.bloco {
            margin-bottom: 25px;
            padding: 8px 20px;
            border-radius: 10px;
            cursor: pointer;
            border: 1px solid #ccc;
        }

        h1 {
            width: 300px;
            height: 10px;
            padding: 25px;
            right: 100px;
            margin-left: auto;
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        button {
            padding: 8px 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .add-note-btn {
            display: flex;
            align-items: center;
        }

        .add-note-btn i {
            margin-right: 4px;
        }

        .delete-note-btn {
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 14px;
            cursor: pointer;
            margin-left: 4px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>



    <header>
        <nav>
            <div class="logo">
                <img src="../img/logo.png.png">
            </div>
      
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="home.php">Home</a></li>
                <li><a href="">Presentes</a></li>
                <li><a href="funcionarios.php">Funcionários</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="fornecedores.php">Fornecedores</a></li>
            </ul>
        </nav>
    </header>

    <div class="area-login"></div>

    <div id="notepad">
        <h1>Bloco de Anotações</h1>
        <form method="POST">
            <ul id="notes-list">
                <?php foreach ($notes as $index => $note): ?>
                    <li class="bloco">
                        <input type="checkbox" name="notes[<?php echo $index; ?>][checked]" <?php echo $note['checked'] ? 'checked' : ''; ?>>
                        <input type="text" name="notes[<?php echo $index; ?>][content]" value="<?php echo $note['content']; ?>">
                        <button type="button" class="delete-note-btn" onclick="deleteNote(this)">X</button>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="add-note-btn">
                <button type="button" onclick="addNote()"><i>+</i>Adicionar Anotação</button>
                <button type="submit" name="save-btn">Salvar</button>
            </div>
            
        </form>
    </div>

    <script>
        function addNote() {
            var notesList = document.getElementById('notes-list');
            var li = document.createElement('li');
            li.innerHTML = '<input type="checkbox" name="notes[checked][]" value="1"><input type="text" name="notes[content][]" value=""><button type="button" class="delete-note-btn" onclick="deleteNote(this)">X</button>';
            notesList.appendChild(li);
        }

        function deleteNote(button) {
            var li = button.parentNode;
            li.parentNode.removeChild(li);
        }
    </script>
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


</body>
</html>