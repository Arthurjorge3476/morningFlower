<?php
$listabloco = select ('blocodenotas');


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

<div class="blocodenotas " >
<div class="area-login mt-5" style="width: 70%;height: 100%;border-radius: 10px;">
        <div id="notepad">
            <h1 class="mt-1" style="justify-content: center;display: flex; font-weight: bold;font-family: arial; ">Bloco de Anotações</h1>
            <form method="POST">
                <ul id="notes-list" class="list-unstyled">
                    <?php foreach ($notes as $index => $note) : ?>
                        <li class="bloco d-flex align-items-center mb-2">
                            <input type="checkbox" name="notas[<?php echo $index; ?>][checked]" <?php echo $note['checked'] ? 'checked' : ''; ?> class="mr-2">
                            <input type="text" name="notes[<?php echo $index; ?>][content]" value="<?php echo $note['content']; ?>" class="form-control mr-2">
                            <button type="button" class="btn btn-danger delete-note-btn" onclick="deleteNote(this)">X</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="add-note-btn mt-3">
                    <button type="button" class="btn btn-primary "name="notas" onclick="addNote()"><i> + </i>Adicionar Anotação</button>
                    <button type="button" class="btn btn-primary">
                        Notificações <span class="badge badge-light">4</span>
                    </button>
                    <button type="button" class="btn btn-primary" ><i> + </i>Editar</button>
                    <button type="submit" name="blocodeanotacao" class="btn btn-primary">Salvar</button>
                    
                </div>
            </form>
        </div>
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