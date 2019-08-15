<?php
require_once("../autoload/autoload.php");
header('Content-Type: application/json');

if(isset($_GET['taskid'])){
    
    $task = Daltask::getTaskById($_GET['taskid']);
    $task->setDone(!$task->getDone());
    $userid = Daluser::getUserId();

    if($task->getUserId() == $userid){
        Daltask::updateTask($task);
        die(json_encode("succ"));
    }
die(json_encode("fail"));

}