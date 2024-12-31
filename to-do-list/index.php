


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

<body>
    <form method=POST>
        <img src = "https://conteudo.imguol.com.br/blogs/284/files/2019/04/04.png"/>
        <h1>ChorumeList</h1>    
        <input name=description placeholder="insira sua task aqui..."> <button name=action value=insert>add task</button>
        <button name=action value=list>ver tasks</button><br>
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
       
  #implementar try catch
        switch($_POST['action']??null):
            case 'insert':
                $task->insert($_POST['description']);
                echo "<script>
                const audio = new Audio('sounds/xii.mp3');
                audio.play();
                </script>";
                 exit;
                exit;
            case 'list':
                foreach ($task->list() as $task){
                    if($task['is_done']){
                        echo " ✅ {$task['id']} | {$task['descricao']}<br> ";
                    }
                    else{
                        echo " ❌ {$task['id']} | {$task['descricao']}<br> ";
                    }
                   
                }
                exit;
            case 'delete':
                $task->delete($_POST['id']);
                echo "<script>
                const audio = new Audio('sounds/ele_gosta.mp3');
                audio.play();
                </script>";
                exit;
            case 'deleteAll':
                $task->deleteAll();
                echo "<script>
                const audio = new Audio('sounds/danca_gatinho.mp3');
                audio.play();
                </script>";
                exit;
            case 'update':
                $task->update($_POST['new_description'], $_POST['id_up']);
                exit;
            case 'is_done':
                $task->upStatus(1, $_POST['id_att']);
                echo "<script>
                const audio = new Audio('sounds/ai.mp3');
                audio.play();
                </script>";
                
            endswitch;
        




    ?>
</body>
</html>


