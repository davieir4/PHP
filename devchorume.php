<?php


#possível cadastro de usuário

class DevChorume {
    private string $nome;
    private string $cargo;
    private string $dataDeNasciemnto;
    private string $linguagemDeProgramação;
    
    
    public function __construct(
        string $nome, 
        string $dataDeNasciemnto, 
        string $cargo, 
        string $linguagemDeProgramação
    ){
        $this->nome = $nome;
        $this -> dataDeNasciemnto = $dataDeNasciemnto;
        $this->cargo = $cargo;
        $this->linguagemDeProgramação = $linguagemDeProgramação;
        
    }
    public function setAlteraNome($novoNome){
        $this->nome = $novoNome;
    }

}

/*
    $manoDeyvin = new DevChorume(
        "Deyvid Nascimento",
        "01/01/90",
        "Senior",
        "Ruby on Rails"
    );


print_r($manoDeyvin);
*/

?>
