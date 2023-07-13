<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Morning Flower</title>
    <link rel="stylesheet" href="../css/telainicial.css" />
  </head>

  <body>
    <header>
  
      <nav>
        <div class="logo"> <img src="../img/logo.png.png"> </div>
      
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
    <div class="area-login">

    </div>
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
<html>
<head>
    <title>Bloco de Anotações</title>
    <style>
        body {
            background-image: url('notebook-paper.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        #notepad {
            width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div id="notepad">
        <h1>Bloco de Anotações</h1>
        <form method="POST">
            <ul id="notes-list">
                <?php foreach ($notes as $index => $note): ?>
                    <li>
                        <input type="checkbox" name="notes[<?php echo $index; ?>][checked]" <?php echo $note['checked'] ? 'checked' : ''; ?>>
                        <input type="text" name="notes[<?php echo $index; ?>][content]" value="<?php echo $note['content']; ?>">
                    </li>
                <?php endforeach; ?>
            </ul>
            <button type="button" onclick="addNote()">Adicionar Anotação</button>
            <button type="submit">Salvar</button>
        </form>
    </div>

    <script>
        function addNote() {
            var notesList = document.getElementById('notes-list');
            var li = document.createElement('li');
            li.innerHTML = '<input type="checkbox" name="notes[][checked]"><input type="text" name="notes[][content]">';
            notesList.appendChild(li);
        }
    </script>
</body>
</html>





