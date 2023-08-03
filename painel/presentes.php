<!DOCTYPE html>
<html>
<head>
    <title>Galeria de Imagens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .produtos {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .imagensprodutos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            overflow-y: auto; /* Adicionado para criar uma barra de rolagem vertical */
            max-height: 400px; /* Altura máxima da área de imagens */
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
    </style>
</head>
<body>
    <div class="produtos">
        <h2>Galeria de Imagens</h2>
        <form action="pagina_de_resultados.php" method="post">
            <div class="imagensprodutos">
                <div class="image">
                    <img src="../img/flor3.png" alt="Imagem 1">
                    <input type="checkbox" class="checkbox" name="selecionadas[]" value="flor3.png">
                </div>
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
              
            </div>
            <input type="submit" value="Enviar Selecionadas">
        </form>
    </div>
</body>
</html>
