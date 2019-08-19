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
    <link rel="stylesheet" href="style/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div>
        <!-- Task details -->
        <h1> 
            To Do=<?php echo ($task->getTitle()) ?>
        </h1>
        <h2> 
            Deadline=<?php echo ($task->getDate()) ?>
        </h2>
        <h3> 
            werkdruk=<?php echo ($task->getWork()) ?>/20
        </h3>
        <button id="markbutton" class="btn btn-primary">Mark</button>
        <?php
       // if($userid === $task["taskid"]){
       //    echo "<a href='edit.php?id=$id' class='btnEdit' >edit post</a>";
       // }
        ?>
    </div>
    <div>
        <!-- Comemnets -->
        <div>
            <!-- Comments input + send button -->
            <input type="text" id="commentbox">
            <button class="btn btn-primary" id="postBtn">add comment</button>
        </div>
        <div>
            <!-- All the comments that have been writen -->
            <?php
            if(!empty($comments)){
                foreach($comments as $comment){
                ?>
                <div class="col-sm-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong><?php echo $comment->getUser()->getUsername()?></strong>
                        </div>
                        <div class="panel-body">
                            <?php echo ($comment->getComment()) ?>
                        </div>
                    </div>
                    </div>
                    </div>
                <?php
                }
            }
            ?>

    <!-- <div class="col-sm-5">
        <div class="panel panel-default">

            <div class="panel-heading">
                <strong><php echo htmlspecialchars($comment->getUser()->getUsername())?></strong>
            </div>

            <div class="panel-body">
                <php echo htmlspecialchars($comment->getComment()) ?>
            </div>
        </div>
    </div> -->

<!-- 
<div class="comments">
<p> 
<php echo htmlspecialchars($comment->getComment()) ?>
</p>
<p>
<php echo htmlspecialchars($comment->getUser()->getUsername())?>
</p>
</div> -->


        </div>
    </div>
    <script src="js/comment.js"></script>
</body>
</html>