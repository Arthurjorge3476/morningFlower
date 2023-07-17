<?php
  // Conectar ao banco de dados
    
  $host = "localhost";
  $dbname = "morningflower";
  $username = "root";
  $password = "aluno01";

  try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Conexão bem-sucedida!";
  } catch(PDOException $i){
    echo "ERRO AO CONECTAR" . $i;
  }
  
?>
