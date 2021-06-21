<?php

use \App\Todoapp\Database as Database;
use \App\Todoapp\Commands as Commands;

include_once 'App/autoload.php';


$obj = new \App\Todoapp\Todo();
echo PHP_EOL;
echo "Available Options : commands,list,add,delete,updateAction,updatePriority,help".PHP_EOL;
echo "Available Actions: done , pending".PHP_EOL;
echo "Available Priority:High,Low,Medium".PHP_EOL;
echo PHP_EOL;





if($argv[1]=="commands" ) {
    echo Commands::$list . PHP_EOL;
    echo Commands::$add . PHP_EOL;
    echo Commands::$delete . PHP_EOL;
    echo Commands::$updateAction . PHP_EOL;
    echo Commands::$updatePriority . PHP_EOL;
}
 else {
     if ($argv[1] == "help") {
         if ($argv[2] == "list") {
             echo Commands::$list;
             echo PHP_EOL;
         } elseif ($argv[2] == "add") {
             echo Commands::$add;
             echo PHP_EOL;

         } elseif ($argv[2] == "delete") {
             echo Commands::$delete;
             echo PHP_EOL;

         } elseif ($argv[2] == "updateAction") {
             echo Commands::$updateAction;
             echo PHP_EOL;

         } elseif ($argv[2] == "updatePriority") {
             echo Commands::$updatePriority;
             echo PHP_EOL;
         }
     }

}


if($argv[1]=="list"){
    $table =  readline('Enter table name: ');
    $obj->getData($table);
}
elseif($argv[1]=='add'){
    $task =  readline('Enter a task: ');
    $action =  readline('action: ');
    $priority=  readline('priority: ');

    $obj->insertData($task,$action,$priority);
}
elseif($argv[1]=="delete"){
    $delete =  readline('Delete a task: ');
    $obj->deleteData($delete);
}
elseif($argv[1]=='updateAction'){
    $action =  readline('status of task: ');
    $id =  readline('action on id: ');
    $obj->updateAction($action,  $id);
}

elseif($argv[1]=='updatePriority'){
    $priority =  readline('priority of task: ');
    $id =  readline('action on id: ');
    $obj->updatePriority($priority,  $id);
}


