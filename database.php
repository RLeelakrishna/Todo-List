<?php

namespace Todolist;

class Database
{
    private $hostname ="127.0.0.1";
    private $root = "root";
    private $password = "root12345";
    private $dbname = "connection";
    private $con ;

    public function __construct(){
       $this->con = new \mysqli($this->hostname,$this->root,$this->password,$this->dbname);
        if($this->con->connect_error){
            echo "connection failed";
        }
          return $this->con;
    }

    public function getdata($table){
        $sql = "select * from $table";
        $result = $this->con->query($sql);
            while($tasks = $result->fetch_assoc()){
                echo $tasks['task_description'] . PHP_EOL;

            }
    }



    public function insertdata($task , $action , $priority){
        $sql = "INSERT INTO task (task_description,`action`,priority) values ('$task','$action','$priority')";
        $result = $this->con->query($sql);
        return $result;
    }



    public function delete($delete){
        $sql = "DELETE FROM  task where id=$delete";
        $result = $this->con->query($sql);
        return $result;
    }

    public function updateaction($action , $id){
        $query = "update task set action='$action' where id='$id'";
        $result = $this->con->query($query);
        return $result;
    }

    public function updatepriority($priority , $id){
        $query = "update task set priority='$priority' where id='$id'";
        $result = $this->con->query($query);
        return $result;
    }



}




