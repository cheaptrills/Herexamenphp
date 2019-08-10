<?php
require_once("autoload/autoload.php");
if(!isset($_GET['taskid'])){

    header('Location: ' . $_SERVER['HTTP_REFERER']);

} 
$task = Daltask::getTaskById($_GET['taskid']);
$comment = Dalcomment::getCommentsByTaskId($task->getId());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/getParameters.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <!-- Task details -->
    </div>
    <div>
        <!-- Comemnets -->
        <div>
            <!-- Comments input + send button -->
        </div>
        <div>
            <!-- All the comments that have been writen -->
        </div>
    </div>
</body>
</html>