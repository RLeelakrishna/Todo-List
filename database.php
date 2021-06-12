<?php

class database
{
    private $hostname ="127.0.0.1";
    private $root = "root";
    private $password = "root12345";
    private $dbname = "connection";
    private $con ;

    public function __construct(){
       $this->con = new mysqli($this->hostname,$this->root,$this->password,$this->dbname);
        if($this->con->connect_error){
            echo "connection failed";
        }
          return $this->con;
    }

    public function getdata(){
        $sql = "select * from Task";
        $result = $this->con->query($sql);
            while($row = $result->fetch_assoc()){
                echo $row['task_description']; ?>
                        .
           <?php
            }
    }



    public function insertdata($task , $action , $priority){
        $sql = "INSERT INTO Task (task_description,`action`,priority) values ('$task','$action','$priority')";
        $result = $this->con->query($sql);
        return $result;
    }



    public function delete($delete){
        $sql = "DELETE FROM  Task where id=$delete";
        $result = $this->con->query($sql);
        return $result;
    }

    public function edit($action , $id){
        $query = "update Task set action='$action' where id='$id'";
        $result = $this->con->query($query);
        return $result;
    }



}

