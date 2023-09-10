<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeImagem = $_FILES["imagem"]["name"];
    $caminhoTemporario = $_FILES["imagem"]["tmp_name"];
    $caminhoDestino = "uploads/" . $nomeImagem; // Diretório onde a imagem será armazenada

    if (move_uploaded_file($caminhoTemporario, $caminhoDestino)) {
        // O upload foi bem-sucedido, agora insira os dados no banco de dados
        $conexao = new PDO("mysql:host=localhost;dbname=morning flower", "root", "");
        $sql = "INSERT INTO imagens (nome, caminho) VALUES ($nome, $caminho)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$nomeImagem, $caminhoDestino]);
        echo "Upload bem-sucedido!";
    } else {
        echo "Erro ao fazer o upload da imagem.";
    }
}
