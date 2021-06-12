<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include 'database.php';

$obj = new database();
$action =  readline('status of task: ');
$id =  readline('action: ');

if($argv[1]='edit'){
    $obj->edit($action , $id);
}


