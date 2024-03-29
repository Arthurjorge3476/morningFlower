<?php
@session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: ../index.php');
}


include_once('../consultaSQL.php');

if (isset($_POST['cadastrarFuncionarios'])) {

    $nome = $_POST['nome'];
    $data_de_nascimento = $_POST['data_de_nascimento'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $ctps = $_POST['ctps'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = md5($_POST['senha']);
    $grupo_de_acesso = $_POST['grupo_de_acesso'];

    $campos = array('nome', 'data_de_nascimento', 'rg', 'cpf', 'ctps', 'cidade', 'endereco', 'cep', 'email', 'telefone', 'senha', 'grupo_de_acesso');
    $valores = array($nome, $data_de_nascimento, $rg, $cpf, $ctps, $cidade, $endereco, $cep, $email, $telefone, $senha, $grupo_de_acesso);

    inserir('funcionarios', $campos, $valores);
}





if (isset($_POST['cadastrarcomprovante'])) {


    $id = $_POST['id'];
    $pedido = $_POST['pedido'];
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];



    $campos = array('id', 'pedido', 'produto', 'quantidade');
    $valores = array($id, $pedido, $produto, $quantidade);

    inserir('comprovante', $campos, $valores);
}



if (isset($_POST['cadastrarClientes'])) {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $campos = array('nome', 'cpf', 'cidade', 'endereco', 'cep', 'email', 'telefone');
    $valores = array($nome, $cpf,  $cidade, $endereco, $cep, $email, $telefone,);

    inserir('clientes', $campos, $valores);
}



if (isset($_POST['cadastrarFornecedores'])) {


    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $telefone1 = $_POST['telefone1'];
    $telefone2 = $_POST['telefone2'];
    $email = $_POST['email'];
    $cnpj = $_POST['cnpj'];
    $vendedor = $_POST['vendedor'];
    $telefonevendedor1 = $_POST['telefonevendedor1'];
    $telefonevendedor2 = $_POST['telefonevendedor2'];
    $condicaodavenda = $_POST['condicaodavenda'];
    $atividade = $_POST['atividade'];

    $campos = array('codigo', 'nome', 'endereco', 'cidade', 'bairro', 'estado', 'cep', 'telefone1', 'telefone2', 'email', 'cnpj', 'vendedor', 'telefonevendedor1', 'telefonevendedor2', 'condicaodavenda', 'atividade');
    $valores = array($codigo, $nome, $endereco, $cidade, $bairro, $estado, $cep, $telefone1, $telefone2, $email, $cnpj, $vendedor, $telefonevendedor1, $telefonevendedor2, $condicaodavenda, $atividade);

    inserir('fornecedores', $campos, $valores);
}





if (isset($_POST['cadastrarProdutos'])) {

    $hostname = 'localhost'; // Host do banco de dados
    $database = 'morning flower'; // Nome do banco de dados
    $username = 'root'; // Nome do usuário do banco de dados
    $password = ''; // Senha do usuário do banco de dados

    $conn = new mysqli($hostname, $username, $password, $database);

    if (isset($_FILES['imagem']) && !empty($_FILES['imagem']['name'])) {
        $imagem = "../uploads/" . $_FILES['imagem']['name'];
    
        // Move o arquivo de imagem para o diretório correto
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
      } else {
        $imagem = "../uploads/images.jpg";
      }
    $codigo = $_POST['codigo'];
    $produto = $_POST['produto'];
    $categoria = $_POST['categoria'];
    $fornecedor = $_POST['fornecedor'];
    $precodecompra = $_POST['precodecompra'];
    $precodevenda = $_POST['precodevenda'];
    $estoque = $_POST['estoque'];
    $validade = $_POST['validade'];
    $observacao = $_POST['observacao'];

    // BUSCAR TODOS OS CÓDIGOS JÁ ADICIONADOS PRODUTOS

    $sqlProduto = "SELECT * FROM produtos WHERE codigo='$codigo'";
    $resultProduto = $conn->query($sqlProduto);
    $totalPro = $resultProduto->num_rows;

    if ($resultProduto->num_rows > 0) {

        echo "<script>alert('Código de produto já cadastrado!')</script>";
    } else {

        $campos = array('codigo', 'produto', 'categoria', 'fornecedor', 'precodecompra', 'precodevenda', 'estoque', 'validade', 'observacao', 'imagem');
        $valores = array($codigo, $produto, $categoria, $fornecedor, $precodecompra, $precodevenda, $estoque, $validade, $observacao, $imagem);
    
        inserir('produtos', $campos, $valores);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/telainicial.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="login">
    <header class="corpo">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <div class="iconelogo">
                <img src="../img/logo.png.png" class="img-fluid">
            </div>
            <a class="navbar-brand" href="index.php" style="font-family: lucida handwriting;">Morning Flower</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link " href="index.php">Home <span class="sr-only">(Página atual)</span></a>
                    <a class="nav-item nav-link " href="index.php?acao=estoque">Estoque</a>
                    <a class="nav-item nav-link " href="index.php?acao=funcionarios">Funcionários</a>
                    <a class="nav-item nav-link " href="index.php?acao=produtos">Produtos</a>
                    <a class="nav-item nav-link  " href="index.php?acao=fornecedores">Fornecedores</a>
                    <a class="nav-item nav-link  " href="index.php?acao=clientes">Clientes</a>
                    <a class="nav-item nav-link" href="../logout.php">Sair</a>


                </div>
            </div>
        </nav>

        </div>
        </div>
        </nav>


    </header>

    <div>
        <?php
        if (isset($_GET['acao'])) {
            $acao = $_GET['acao'];
            if ($acao == 'estoque') {
                include('estoque.php');
            } elseif ($acao == 'funcionarios') {
                include('funcionarios.php');
            } elseif ($acao == 'produtos') {
                include('produtos.php');
            } elseif ($acao == 'fornecedores') {
                include('fornecedores.php');
            } elseif ($acao == 'clientes') {
                include('clientes.php');
            }
        } else {
            include('home.php');
        }
        ?>
    </div>
</body>

</html>