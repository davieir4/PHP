<?php

declare(strict_types=1);

class Task
{
    /**
     * @var PDO
     */

    private $connection;

    public function __construct()
    {
        try{
            $this->connection = new  PDO('mysql:host=localhost;dbname=list', 'root', '');
        }catch(Exception $e){
            echo $e->getMessage();
            die();
        }
        
    }
    
    public function insert(string $description): string #Create
    {
        $sql = 'insert into tasks(descricao) values(?)';
 
        $prepare = $this->connection->prepare($sql); 
    
        $prepare->bindParam(1, $description); # metodo que possui prevencao contra sql injection
        $prepare->execute();
    
        return "<br> linhas afetadas: {$prepare->rowCount()} <br>"; #retorna as linhas afetadas
        
    }
    public function list(): array #Read
    {
        $sql = 'select * from tasks';

        $tasks = [];


        echo "<h2>TASKS:<h2>";

        foreach ($this->connection->query($sql) as $value) {
            
            array_push($tasks, $value);
        }
        return $tasks;

    
    }
    public function update(string $newDescription, int $id): string #Uptade
    {
        $sql = 'update tasks set descricao = ?  where id = ?';
        
        $prepare = $this->connection-> prepare($sql);
        
        $prepare->bindParam(1, $newDescription);
        $prepare->bindParam(2, $id);
        
        $prepare -> execute();
        
        return "<br> linhas afetadas: {$prepare->rowCount()}";
        
    }
    public function upStatus(bool $is_done, int $id): void
    {
        $sql = 'update tasks set is_done = ?  where id = ?';
        
        $prepare = $this->connection-> prepare($sql);
        
        $prepare->bindParam(1, $is_done);
        $prepare->bindParam(2, $id);
        
        $prepare -> execute();
          
    }
    public function delete(int $id): string #Delete
    {
        $sql = 'delete from tasks where id = ?';

        $prepare = $this->connection->prepare($sql);
        
        $prepare->bindParam(1, $id);
        $prepare->execute();
        
        return"<br>linhas afetadas: {$prepare->rowCount()}";
        
               
    }
    public function deleteAll(): void
    {
        $sql = 'TRUNCATE TABLE tasks';
        $prepare = $this->connection->prepare($sql);
        $prepare->execute();  
               
    }

};



?>
