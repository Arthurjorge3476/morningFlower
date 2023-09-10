<?php

$listaprodutos = select('produtos');

?>

<title>Galeria de Produtos</title>
<style>
    .produtos {
        height: auto;
        max-width: 100%;
        width: 800px;
        /* Largura do formulário, ajuste conforme necessário */
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        background-size: cover;
        background-attachment: fixed;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        text-align: center;
        /*  overflow-y: auto;  Adicionado para criar uma barra de rolagem vertical */
    }




    .imagensprodutos {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        max-height: 300px;
        /* Altura máxima da área de imagens */
    }

    .image {
        position: relative;
        max-width: 200px;
        margin: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
    }

    .image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .checkbox {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    /* Adicionado estilo para posicionar o botão de enviar ao lado do formulário */
    .form-with-button {
        display: flex;
        justify-content: space-between;
    }
</style>


<div class="produtos" style="width: 90%;height: 840px;background-attachment: fixed;background-size: cover;">
    <h2>Galeria de Imagens</h2>
    <form action="index.php" method="post" class="form-with-button">
        <div class="imagensprodutos">
            <div class="image">
                <img src="../img/flor2.png" alt="Imagem 2">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="flor2.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
            <div class="image">
                <img src="../img/rosas.png" alt="Imagem 3">
                <input type="checkbox" class="checkbox" name="selecionadas[]" value="rosas.png">
            </div>
        </div>
        <input type="submit" value="Enviar Selecionadas">
    </form>
</div>