<?php
$listaProdutos = select('produtos');

if (isset($_POST['pesquisar'])) {
    $termoPesquisa = $_POST['pesquisar'];
    $listaProdutos = array_filter($listaProdutos, function ($produto) use ($termoPesquisa) {
        return stripos($produto['produto'], $termoPesquisa) !== false;
    });
}
?>

<form method="POST" action="index.php?acao=produtos">
    <div class="search-container">
        <div class="search-wrapper">
            <input type="text" id="searchInput" name="pesquisar" placeholder="Pesquisar...">
            <button type="submit" id="searchButton" onclick="searchDate()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </div>
    </div>
    <div id="estoqueBaixoAlert" class="alert alert-danger" style="display: none;">
    Estoque Baixo! A quantidade em estoque está abaixo do mínimo.
</div>

</form>

<div class="tabela">
    <table class="table table-bordered table-hover mt-3">
        <thead class="table-dark cordatabela">
            <tr>
                <th scope="col"></th>
                <th scope="col">Código</th>
                <th scope="col">Produto</th>
                <th scope="col">Validade</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço de Venda</th>
                <th scope="col">Imagem do Produto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listaProdutos as $indice => $linha) { 
                $quantidadeEmEstoque = $linha['estoque'];
                $estoqueMinimo = 5;
                $estoqueBaixo = $quantidadeEmEstoque <= $estoqueMinimo;
            ?>
                <tr class="<?php echo $estoqueBaixo ? 'estoque-baixo' : ''; ?>">
                    <th scope="row"><?php echo $indice + 1; ?></th>
                    <td><?php echo $linha['codigo']; ?></td>
                    <td><?php echo $linha['produto']; ?></td>
                    <td><?php echo $linha['validade']; ?></td>
                    <td><?php echo $linha['estoque']; ?></td>
                    <td><?php echo $linha['precodevenda']; ?></td>
                    <td>
                        <img src="<?php echo $linha['imagem']; ?>" width="75" height="75" />
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    <?php
    $estoqueMinimo = 5; // Defina o estoque mínimo desejado
    $estoqueBaixoEncontrado = false; // Variável para rastrear se um produto com estoque baixo foi encontrado

    // Verifica cada produto
    foreach ($listaProdutos as $linha) { 
        $quantidadeEmEstoque = $linha['estoque'];
        if ($quantidadeEmEstoque <= $estoqueMinimo) {
            $estoqueBaixoEncontrado = true; // Estoque baixo encontrado
            break; // Pare de verificar assim que encontrar um produto com estoque baixo
        }
    }
    ?>

    // Após o loop, use a variável $estoqueBaixoEncontrado para mostrar ou ocultar a mensagem de aviso
    if (<?php echo $estoqueBaixoEncontrado ? 'true' : 'false'; ?>) {
        document.getElementById('estoqueBaixoAlert').style.display = 'block';
    }
</script>


