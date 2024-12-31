<?php
    declare(strict_types=1);

    $pdo = require 'connect.php';
    $sql = 'select * from tasks';

    echo "<h2>TASKS:<h2>";

    foreach ($pdo->query($sql) as $key => $value) {
        
        if($value['is_done']){
            echo '<h4> ID:' . $value["id"] . "<br> Descrição: " . $value['descricao'] . '<br> feito: ✅<br> <h4>';
        } else {
            echo '<h4>ID:' . $value["id"] . "<br> Descrição: " . $value['descricao'] . '<br> feito: ❌  <br> <h4>';  
        }
        
    }


?>