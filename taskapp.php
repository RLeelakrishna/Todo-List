<?php

use Todolist\Database;

include 'database.php';

$obj = new Database();





if($argv[1]=="getdata"){
    $table =  readline('Enter table name: ');
    $obj->getdata($table);
}
elseif($argv[1]=='insertdata'){
    $task =  readline('Enter a task: ');
    $action =  readline('action: ');
    $priority=  readline('priority: ');

    $obj->insertdata($task,$action,$priority);
}
elseif($argv[1]=="delete"){
    $delete =  readline('Delete a task: ');
    $obj->delete($delete);
}
elseif($argv[1]=='updateaction'){
    $action =  readline('status of task: ');
    $id =  readline('action on id: ');
    $obj->updateaction($action,  $id);
}

elseif($argv[1]=='priority'){
    $priority =  readline('priority of task: ');
    $id =  readline('action on id: ');
    $obj->updatepriority($priority,  $id);
}

