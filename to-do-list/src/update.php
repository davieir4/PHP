<?php

declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'update tasks set descricao = ?, is_done = ? where id = ?';

$prepare = $pdo-> prepare($sql);

$prepare->bindParam(1, $_GET['descricao']);
$prepare->bindParam(2, $_GET['is_done']);
$prepare->bindParam(3, $_GET['id']);

$prepare -> execute();

echo "<br> linhas afetadas: {$prepare->rowCount()}";


?>