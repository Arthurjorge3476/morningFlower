<?php
 echo "teste";

    try {

    $conexao = new PDO("mysql:localhost;dbname=morningFlower",$root,$aluno01 );

    } catch(PDOException $i){
        echo 'ERROR:' . $i->getMessage();
    }
?>