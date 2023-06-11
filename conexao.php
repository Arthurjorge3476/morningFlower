<?php
 echo "teste";

    try {

    $conexao = new PDO('mysql:host=localhost;dbname=morningflower',$root,$aluno01 );

    } catch(PDOException $i){
        echo 'ERROR:' . $i->getMessage();
    }
?>