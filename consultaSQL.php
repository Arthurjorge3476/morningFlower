<?php

function conectar() {
// Configurações do banco de dados
$hostname = 'localhost'; // Host do banco de dados
$database = 'morningflower'; // Nome do banco de dados
$username = 'root'; // Nome do usuário do banco de dados
$password = ''; // Senha do usuário do banco de dados

try {
    // Criando uma instância do objeto PDO
    $conexao = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    return $conexao;

    // Agora você pode executar consultas no banco de dados usando a variável $conexao
} catch (PDOException $e) {
    // Em caso de erro na conexão, trata a exceção aqui
    die("Erro na conexão com o banco de dados: " . $e);
}
}




function select($tabela, $where = null) {
    $conexao = conectar();

    try {
        if (isset($where)) {
            $sql = "SELECT * FROM $tabela WHERE $where";
            $stmt = $conexao->prepare($sql);
        } else {
            $sql = "SELECT * FROM $tabela";
            $stmt = $conexao->prepare($sql);
        }

        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $conexao = null;
        return $resultado;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}



    




function inserir ($tabela, $campos, $valores) {
$conexao = conectar();

try {
// Tratamento de campos vazios
 foreach ($valores as &$valor) {
     if (empty($valor)) {
      $valor = null;
        }
    }
// Montar a query SQL para a inserção de dados
$sql = "INSERT INTO $tabela (";
$sql .= implode(', ', $campos);
$sql .= ") VALUES (";
$sql .= implode(', ', array_fill(0, count($valores), '?'));
$sql .= ")";


// Preparar a declaração
$stmt = $conexao->prepare($sql);

// Executar a query com os valores dos parâmetros
$stmt->execute($valores);

// Fechar a conexão
$conexao = null;

// Retorna verdadeiro se a inserção foi bem-sucedida
return true;
} catch (PDOException $e) {
// Em caso de erro, você pode tratar a exceção aqui ou retornar um erro personalizado
echo "Erro: " . $e->getMessage();
return false;
}
}

function deletar ($tabela, $id) {
    $conexao = conectar();

    try {
        $sql = "DELETE FROM $tabela WHERE id = $id";
        $stmt = $conexao -> prepare ($sql);
        $stmt -> execute();
        $conexao = null;
    } catch (PDOException $e) {
        echo $e;
    }
}


?>