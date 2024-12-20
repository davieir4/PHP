<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img  src=https://image.civitai.com/xG1nkqKTMzGDvpLrqFT7WA/d4f5d715-91d2-45b0-b397-06ee11da4277/width=450/FLUX_GGUF_Q8_00537_.jpeg>
    <H1>
        Mano Deyvin sound effects: <br>
          
    </H1>
    <br>
    <form method="post">
        <button name="Ai">Ai</button>
        <button name="ele_gosta">ELE GOSTA</button>
        <button name="pam">*PAM*</button>
        <button name="stop">STOP</button>
        <button name="delete">Delete</button>
    
    </form>
    <br>
        <form method="post">
        <input placeholder="nome" name="nome"/>
        <input  placeholder="senha "type="password" name="senha"/>
        <button type="submit">Enviar</button>
    
    </form>

    <?php
        

        #praticar o tratamento de excessões



        $som = ['ai' => isset($_POST['Ai']),
                'ele' => isset($_POST['ele_gosta']),
                'pam' => isset($_POST['pam']), 
                'del' => isset($_POST['delete']),
                'stop' => isset($_POST['stop'])];
        
        if($som['ai']){ 

            do{
                echo "Ai <br>";
                sleep(1); // wait for 1 sec 
            
            }
            while(!isset($_POST['stop'])); //para isso teremos que usar sessão
               
                
    
        }
        if($som['ele']){

            echo "Ele Gosta <br>";
    
        }
        if($som['pam']){

            echo "*PAAAAAAAAAAAAMMMMMMMM!!!* <br>";
    
        }
        if($som['del']){

                echo "<br>";
        
        }
        
     ?>



</body>
</html>

