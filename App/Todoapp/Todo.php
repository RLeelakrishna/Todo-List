<?php


namespace App\Todoapp;


class Todo extends Database
{
    public function getData($table){
        $sql = "select id,task_description,`priority` from $table";
        $result = $this->con->prepare($sql);
        $result->execute();
        $result->store_result();
        if($result->num_rows > 0){
            $result->bind_result($id,$tasks,$priority);
        }
        while($result->fetch()){
            echo "(".$id.")".$tasks."(" .(($priority))." "."priority" .")". PHP_EOL.PHP_EOL;
        }
        return $result;
    }


    public function insertData($task , $action , $priority){
        $sql = "INSERT INTO task (task_description,`action`,priority) values (?,?,?)";
        $result = $this->con->prepare($sql);
        $result->bind_param('sss' ,$task,$action,$priority);
        $result->execute();
        return $result;
    }




    public function deleteData($delete){
        $sql = "DELETE FROM  task where id= ? ";
        $result = $this->con->prepare($sql);
        $result->bind_param('i',$delete);
        $result->execute();
        return $result;
    }

    public function updateAction($action , $id){
        $query = "update task set action= ? where id= ?";
        $result = $this->con->prepare($query);
        $result->bind_param('si' , $action,$id);
        $result->execute();
        return $result;
    }

    public function updatePriority($priority , $id){
        $query = "update task set priority= ? where id= ?";
        $result = $this->con->prepare($query);
        $result->bind_param('si',$priority,$id);
        $result->execute();
        return $result;
    }


}






