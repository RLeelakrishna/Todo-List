<?php

namespace App\Todoapp;

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


    public function insertdata($task , $action , $priority){
        $sql = "INSERT INTO task (task_description,`action`,priority) values (?,?,?)";
        $result = $this->con->prepare($sql);
        $result->bind_param('sss' ,$task,$action,$priority);
        $result->execute();
        return $result;
    }




    public function delete($delete){
        $sql = "DELETE FROM  task where id= ? ";
        $result = $this->con->prepare($sql);
        $result->bind_param('i',$delete);
        $result->execute();
        return $result;
    }

    public function updateaction($action , $id){
        $query = "update task set action= ? where id= ?";
        $result = $this->con->prepare($query);
        $result->bind_param('si' , $action,$id);
        $result->execute();
        return $result;
    }

    public function updatepriority($priority , $id){
        $query = "update task set priority= ? where id= ?";
        $result = $this->con->prepare($query);
        $result->bind_param('si',$priority,$id);
        $result->execute();
        return $result;
    }



}




