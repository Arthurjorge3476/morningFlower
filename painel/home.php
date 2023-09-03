<?php
$filename = 'notepad.txt'; // Nome do arquivo de anotações

if (isset($_POST['anotacoes'])) {
    $notes = $_POST['notes'];
    $notesJSON = json_encode($notes); // Certifique-se de que $notes contém os dados corretos
    var_dump($notesJSON); // Verifique os dados antes de inserir

    if (inserirAnotacoes($notesJSON)) {
        echo 'Anotações inseridas com sucesso!';
    } else {
        echo 'Erro ao inserir anotações.';
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notes = $_POST['notes']; // Obtém as anotações enviadas pelo formulário
    $_SESSION['notes'] = $notes; // Armazena as anotações na sessão

    echo 'Anotações salvas com sucesso!';
}

// Obtém as anotações da sessão, se existirem
$notes = isset($_SESSION['notes']) ? $_SESSION['notes'] : array();
?>

<div class="blocodenotas">
    <div class="area-login mt-5" style="width: 70%;height: 100%;border-radius: 10px;">
        <div id="notepad">
            <h1 class="mt-1" style="justify-content: center;display: flex; font-weight: bold;font-family: arial;">Bloco de Anotações</h1>
            <form method="POST">
                <ul id="notes-list" class="list-unstyled">
                    <?php foreach ($notes as $index => $note) : ?>
                        <?php
                        $isChecked = isset($note['checked']) && $note['checked'];
                        $contentValue = isset($note['content']) ? $note['content'] : '';
                        ?>
                        <li class="bloco d-flex align-items-center mb-2">
                            <input type="checkbox" name="notes[<?php echo $index; ?>][checked]" <?php echo $isChecked ? 'checked' : ''; ?> class="mr-2">
                            <input type="text" name="notes[<?php echo $index; ?>][content]" value="<?php echo $contentValue; ?>" class="form-control mr-2">
                            <button type="button" class="btn btn-danger delete-note-btn" onclick="deleteNote(this)">X</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="add-note-btn mt-3">
                    <button type="button" class="btn btn-primary" onclick="addNote()">Adicionar Anotação</button>
                    <input type="hidden" name="anotacoes" value="1">
                    <button type="submit" name="blocodeanotacao" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
