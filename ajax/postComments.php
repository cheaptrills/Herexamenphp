<?php
require_once("../autoload/autoload.php");
header('Content-Type: application/json');

if(isset($_GET['post'])){

    $comment = $_GET['comment'];
    $task = $_GET['taskid'];
    $user_id = Daluser::getUserId();

    Dalcomment::createComment($comment,$user_id,$task);

}