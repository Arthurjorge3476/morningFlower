<?php

$listaProdutos = select('produtos');




if (isset($_POST['pesquisar'])) {
    $termoPesquisa = $_POST['pesquisar'];
    $listaProdutos = array_filter($listaProdutos, function ($produtos) use ($termoPesquisa) {
        // Aqui, você pode ajustar como deseja que a pesquisa seja realizada.
        // Atualmente, ela é case-insensitive e verifica se o nome contém o termo de pesquisa.
        return stripos($produtos['produto'], $termoPesquisa) !== false;
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
            foreach ($listaProdutos as $indice => $linha) { ?>

                <tr class="">
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
            <?php };
            ?>

        </tbody>
    </table>