
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>>Calculadora PHP</h1><br>
<h4>Digite dois números</h4>
<form method="get">
    <input name='n1' placeholder="primeiro número">
    <input name='n2' placeholder="segundo número">
    <button name='operation' value='division' type='submit'>divisão</button> 
</form>
<body>
<?php

function calculadora($n1, $n2, $operation){

    switch($operation){
        
        case $operation == 'division':
            if($n2 == 0){
                throw new Exception("ERRO: Não é possível dividir por zero, você quebrou o espaço-tempo!");
            }
        echo $n1 / $n2;
        break;


    }
}

$n1 = $_GET['n1'] ?? null;
$n2 = $_GET['n2'] ?? null ;
$operation = $_GET['operation'] ?? null;



/*
try{

    if (!is_numeric($n1) || !is_numeric($n2)){
        throw new Exception("Os valores devem ser númericos!");
    }

}catch(Exception ){ 
    echo"ERRO: formato inválido";
}

*/

try{

    if (!is_numeric($n1) || !is_numeric($n2)){
        throw new Exception("Os dois valores devem ser númericos!");
    }

    calculadora($n1, $n2, $operation);

}catch (Exception $e) {
   echo '<br>' . $e->getMessage();
   die();
}



?>
</body>
</html>
