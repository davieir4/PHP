

<?php

class Venda{
    private string $data;
    private string $produto;
    private int $quantidade;
    private float $valorTotal;


    public function __construct(
    string $data,
    string $produto, 
    int $quantidade, 
    float $valorTotal){

        $this->data = $data;
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->valorTotal = $valorTotal;

    }

    public function recibo()
    {
        echo "DATA: " . $this->data . "<br>";
        echo "PRODUTO: " . $this->produto . "<br>";
        echo "QUANTIDADE: " . $this->quantidade . "<br>";
        echo"TOTAL= R\${$this->valorTotal} <br>";
    }
}

 
$venda = new Venda("26/12/2024", "Consultoria", 1, 299.99); #pode ser um formulário html

$venda->recibo();

?>




