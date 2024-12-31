<?php
    declare(strict_types=1);

    $pdo = require 'connect.php';
    $sql = 'insert into tasks(descricao) values(?)';
 
    $prepare = $pdo->prepare($sql); 

    $prepare->bindParam(1, $_GET['descricao']); # metodo que possui prevencao contra sql injection
    $prepare->execute();

    echo "<br> linhas afetadas: {$prepare->rowCount()} <br>"; #retorna as linhas afetadas
?>