<?php


include 'database.php';

$obj = new database();
$task =  readline('Enter a task: ');
$action =  readline('action: ');
$priority=  readline('priority: ');



if($argv[1]='insertdata'){
    $obj->insertdata($task,$action,$priority);

}