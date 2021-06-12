<?php





include 'database.php';


$obj = new database();
$delete =  readline('Delete a task: ');
if($obj){
    $obj->delete($delete);
}
