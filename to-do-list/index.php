


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            max-width: 250px; /* Define a largura máxima */
            height: auto; /* Mantém a proporção da imagem */
        }
    </style>
</head>
<style>
    @media (max-width: 600px) {
        input, button {
            width: 100%;
        }

        body {
            padding: 10px;
        }
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        color: #333;
        margin: 0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        color: #007BFF;
    }

    h3, h4 {
        color: #555;
    }

    form {
        width: 100%;
        max-width: 500px;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    input, button {
        width: calc(100% - 20px);
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button {
        background: #007BFF;
        color: #fff;
        cursor: pointer;
    }

    button:hover {
        background: #0056b3;
    }

    img {
        display: block;
        margin: 0 auto 20px;
        max-width: 250px;
    }
</style>



<body>
    <!--
    <nav style="background: #007BFF; color: white; padding: 10px; text-align: center;">
        <a href="#addTask" style="color: white; text-decoration: none; margin: 0 10px;">Adicionar</a>
        <a href="#updateTask" style="color: white; text-decoration: none; margin: 0 10px;">Atualizar</a>
        <a href="#deleteTask" style="color: white; text-decoration: none; margin: 0 10px;">Excluir</a>
    </nav>
    !-->

    <form method=POST>

        <h1>ChorumeList</h1>    
        <h4>"Não deixe para desistir amanhã do que você pode desistir ainda hoje". - Steve Jobs</h4>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        
        <input name=description placeholder="insira sua task aqui..."> 
        <button name="action" value="insert"><i class="fas fa-plus"></i>  Adicionar</button>
        <button name="action" value="list"><i class="fas fa-list"></i>  Ver Tarefas</button>

        <h3>Para atualizar uma task digite o id e sua nova descrição</h3>
        <input name=id_up placeholder="digite o id aqui...">
        <input name=new_description placeholder="nova descrição aqui...">

        <button name=action value=update>atualizar task</button><br>
       
        <h3>Para remover uma tarefa, especifique seu número no campo abaixo</h3>
        <input name=id placeholder="o id vem aqui..."><button name=action value=delete>apagar task</button>
        <button name=action value=deleteAll>apagar TUDO</button><br>

        <h3>Já fez sua tarefa? Marque abaixo ✅</h3>
        <input name=id_att placeholder="id da tarefa">
        <button name=action value="is_done"> feito </button><br>
            
   

    </form>


    <?php

        require 'task.php';
    

        $task = new Task;
        
            try{
                switch($_POST['action']??null):
                case 'insert':
                    if(empty($_POST['description'])){
                        throw new Exception('<br> ATENÇÃO: A descrição de sua tarefa não pode ser vazia.');
                    }
                    $task->insert($_POST['description']);
                    echo "<div style='color: green;'>Task adicionada com sucesso!</div>";
                    echo "<script>
                    const audio = new Audio('sounds/ai.mp3');
                    audio.play();
                    </script>";
                     exit;
                      #tabela estilizada
                     case 'list':
                        echo "<ul style='list-style-type: none; padding: 0;'>";
                        foreach ($task->list() as $task) {
                            $status = $task['is_done'] ? "✅" : "❌";
                            echo "<li style='margin: 5px 0;'>
                                    {$status} <strong>ID:</strong> {$task['id']} - {$task['descricao']}
                                  </li>";
                        }
                        echo "</ul>";
                        exit;
                    
                case 'delete':
                    if(!is_numeric($_POST['id']) ||empty($_POST['id']) ||  $task->delete($_POST['id']) == 0 ){
                        throw new Exception('<br> ATENÇÃO: Indique o número da tarefa CORRETAMENTE. <br> Não sabe ainda? clique em VER TAREFAS.');
                    }
                    $task->delete($_POST['id']);
                 
                    exit;
                case 'deleteAll':
                    $task->deleteAll();
                  
                    exit;
                case 'update':
                    if(!is_numeric($_POST['id_up'])){
                        throw new Exception('<br> ATENÇÃO: Indique o número da tarefa CORRETAMENTE. <br> Não sabe ainda? clique em VER TAREFAS.');    
                    }
                    if(empty($_POST['id_up']) || empty($_POST['new_description']) ){
                        throw new Exception('<br> ATENÇÃO: Os dois campos devem ser obrigatoriamente preenchidos, caso deseje apagar selecione as opções de remoção.');
                    }
                    $task->update($_POST['new_description'], $_POST['id_up']);
                    exit;
                case 'is_done':
                    if(empty($_POST['id_att']) || !is_numeric($_POST['id_att'])){
                        throw new Exception('<br> ATENÇÃO: Indique o número da tarefa CORRETAMENTE. <br> Não sabe ainda? clique em VER TAREFAS.');    
                    }
                    $task->upStatus(1, $_POST['id_att']);
                 
                    exit;
                    
                endswitch;
            }catch(Exception $e){
                echo "<script>
                const audio = new Audio('sounds/xii.mp3');
                audio.play();
                </script>";
                echo $e->getMessage();
                
                die();
            }
            
           
            
             


    ?>
</body>
</html>


