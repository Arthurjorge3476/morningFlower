


<?php
/*
// Configuração do banco de dados
$dbConfig = array(  
  $host = "localhost";
  $dbname = "morningflower";
  $username = "root";
  $password = "aluno01";
);

// Conexão com o banco de dados
$connection = new mysqli($dbConfig['host'], $dbConfig['dbname'], $dbConfig['username'], $dbConfig['password']);
if ($connection->connect_error) {
    die('Erro ao conectar ao banco de dados: ' . $connection->connect_error);
}

$termoPesquisa = $_GET['termo'] ?? '';

// Consulta SQL para buscar produtos, fornecedores e funcionários 
$sql = "
    SELECT produto AS produto FROM produtos WHERE produto LIKE '%$termoPesquisa%'
    UNION
    SELECT nome AS nome FROM fornecedores WHERE nome LIKE '%$termoPesquisa%'
    UNION
    SELECT nome AS nome FROM funcionarios WHERE nome LIKE '%$termoPesquisa%'
";

$resultados = array();
if ($result = $connection->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $resultados[] = $row;
    }
    $result->free();
}

$connection->close();

// Retorna os resultados em formato JSON
header('Content-Type: application/json');
echo json_encode($resultados);
?>
*/