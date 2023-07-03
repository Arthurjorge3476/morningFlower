<?php
  // Conectar ao banco de dados
    
  $host = "localhost";
  $dbname = "Morningflower";
  $username = "root";
  $password = "aluno01";

  try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  } catch(PDOException $i){
    echo "ERRO AO CONECTAR" . $i;
  }
?>
