<?php
include_once ('../consultaSQL.php');

if(isset($_POST['cadastrarFuncionarios'])) {

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

header("Location: index.php?acao=funcionarios");
exit; // Certifique-se de sair do script após o redirecionamento
}



if(isset($_POST['cadastrarFornecedores'])){


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

$campos = array('codigo','nome', 'endereco', 'cidade','bairro','estado','cep','telefone1','telefone2','email','cnpj','vendedor','telefonevendedor1','telefonevendedor2','condicaodavenda','atividade');
$valores = array($codigo,$nome, $endereco, $cidade,$bairro,$estado,$cep,$telefone1,$telefone2,$email,$cnpj,$vendedor,$telefonevendedor1,$telefonevendedor2,$condicaodavenda,$atividade);

inserir('fornecedores', $campos, $valores);

}

if(isset($_POST['cadastrarProdutos'])){
$codigo = $_POST['codigo'];
$produto = $_POST['produto'];
$categoria = $_POST['categoria'];
$fornecedor = $_POST['fornecedor'];
$precodecompra = $_POST['precodecompra'];
$precodevenda = $_POST['precodevenda'];
$margemdelucro = $_POST['margemdelucro'];
$lucroanterior = $_POST['lucroanterior'];
$estoque = $_POST['estoque'];
$validade = $_POST['validade'];
$observacao = $_POST['observacao'];
//$fotodoproduto = $_POST['fotodoproduto'];

$campos = array('codigo','produto','categoria','fornecedor','precodecompra','precodevenda','margemdelucro','lucroanterior','estoque','validade','observacao'); //'fotodoproduto'
$valores = array($codigo,$produto,$categoria,$fornecedor,$precodecompra,$precodevenda,$margemdelucro,$lucroanterior,$estoque,$validade,$observacao); //$fotodoproduto

inserir('produtos',$campos,$valores);
}

if(isset($_POST['blocodeanotacao'])){
    
    $bloco = $_POST['notas'];

    $campos= array('notas');
    $valores = array($bloco);

    inserir('blocodenotas',$campos,$valores);

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="login">
    <header class="corpo">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
                    <div class="iconelogo" >
                        <img src="../img/logo.png.png" class="img-fluid">
                    </div>
            <a class="navbar-brand" href="index.php" style="font-family: lucida handwriting;">Morning Flower</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link " href="index.php">Home <span class="sr-only">(Página atual)</span></a>
                    <a class="nav-item nav-link " href="index.php?acao=presentes">Presentes</a>
                    <a class="nav-item nav-link " href="index.php?acao=funcionarios">Funcionários</a>
                    <a class="nav-item nav-link " href="index.php?acao=produtos">Produtos</a>
                    <a class="nav-item nav-link  " href="index.php?acao=fornecedores">Fornecedores</a>
                    <a class="nav-item nav-link" href="index.php?acao=comprovante">Comprovante</a>

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
            if($acao == 'presentes') {
                include('presentes.php');
            } elseif ($acao == 'funcionarios') {
                include('funcionarios.php');
            }
            elseif($acao == 'produtos') {
                include('produtos.php');
            }
            elseif($acao == 'fornecedores'){
                include('fornecedores.php');
            }
             elseif($acao == 'comprovante'){
                include('formulario_comprovante.php');
             }
        } else {
            include('home.php');
        }
    ?>
</div>
</body>

</html>

