<?php

    declare(strict_types=1);

    $pdo = null;

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=list', 'root', '');

    }catch(Exception $e) {
        echo $e->getMessage();
        die();
    }
    echo"conexão criada com sucesso 🚀";
    return $pdo;
    
    
?>
