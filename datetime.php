#datetime manipulation exercise 

<?php

$data = new DateTime(); #classe data e hora
$periodo = new DateInterval('P5DT10H50M'); #classe que determina um intervalo temporal
$data->sub($periodo);

var_dump($data);

?>
