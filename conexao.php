<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os valores do formulário
    
   
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cidade = $_POST["cidade"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cpf = $_POST["cpf"];
  
    
  
   
  
  
  // Conectar ao banco de dados
    
   
  $host = "localhost";
    
   
  $dbname = "morningFlower";
    
   
  $username = "root";
    
   
  $password = "aluno01";
  
    
  
   
  
  
  try {
      
     
  $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      
     
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      
  
     
  
  
  // Preparar a consulta SQL
      
     
  $sql = "INSERT INTO funcionarios (Nome, Sobrenome, Cidade, Email, Telefone, CPF) VALUES (:nome, :sobrenome, :cidade, :email, :telefone, :cpf)";
  
     
  $stmt = $conexao->prepare($sql);
  
      
  
     
  
  
  // Vincular os valores do formulário aos parâmetros da consulta
      
     
  $stmt->bindParam(':nome', $nome);
      
     
  $stmt->bindParam(':sobrenome', $sobrenome);
      
     
  $stmt->bindParam(':cidade', $cidade);
      

  
     
  $stmt->bindParam(':email', $email);
      
     
  $stmt->bindParam(':telefone', $telefone);
      
      
  $stmt->bindParam(':cpf', $cpf);
  
      
  
     
  
  
  // Executar a consulta
      
     
  $stmt->execute();
  
      
  
     
  
  
  echo "Dados inseridos com sucesso!";
    } 
   
  catch (PDOException $e) {
      echo "Erro ao inserir dados: " . $e->getMessage();
    }
  }
  
?>
