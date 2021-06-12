<?php


include 'database.php';

$obj = new database();

if($argv[1]='getdata'){
    $obj->getdata();
}

