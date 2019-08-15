<?php
require_once("../autoload/autoload.php");
header('Content-Type: application/json');

if(isset($_GET['userid'])){

    die(json_encode(Dalcomment::getCommentsByUserId($_GET['userid'])));

}
if(isset($_GET['taskid'])){

    die(json_encode(Dalcomment::getCommentsByTaskId($_GET['taskid'])));

}




echo(json_encode(Dalcomment::getComments()));
