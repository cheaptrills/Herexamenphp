<?php
require_once("autoload/autoload.php");
if(!isset($_GET['taskid'])){

    header('Location: ' . $_SERVER['HTTP_REFERER']);

} 
$task = Daltask::getTaskById($_GET['taskid']);
$comments = Dalcomment::getCommentsByTaskId($task->getId());
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
        <p> 
            <?php echo htmlspecialchars($task->getTitle()) ?>
        </p>
        <p> 
            <?php echo htmlspecialchars($task->getDate()) ?>
        </p>
        <p> 
            <?php echo htmlspecialchars($task->getWork()) ?>
        </p>
        <button id="markbutton">mark</button>
    </div>
    <div>
        <!-- Comemnets -->
        <div>
            <!-- Comments input + send button -->
            <input type="text" id="commentbox">
            <button id="postBtn">add comment</button>
        </div>
        <div>
            <!-- All the comments that have been writen -->
            <?php
            if(!empty($comments)){
                foreach($comments as $comment){
                ?>
                <div class="comments">
                <p> 
                <?php echo htmlspecialchars($comment->getComment()) ?>
                </p>
                <p>
                <?php echo htmlspecialchars($comment->getUser()->getUsername())?>
                </p>
                 </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
    <script src="js/comment.js"></script>
</body>
</html>