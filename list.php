<?php
require_once("autoload/autoload.php");
if(isset($_GET["listid"])){

    $listid = $_GET["listid"];

}else {
    header("location: index.php");
}
$lists = Dallist::getListById($listid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
    <p>title: <?php echo($lists->getTitle());  ?></p>
    </div>
    <div><a href="addtask.php?listid=<?php echo($listid) ?>">Add Task</a></div>
    <div><a href="done.php?listid=<?php echo($listid) ?>">Done tasks</a></div>
    <div>
    <?php 
    foreach($lists->getTodos() as $todo){
        if(!$todo->getDone()){
            echo("<p><a href='task.php?taskid={$todo->getId()}'>{$todo->getTitle()}</a> {$todo->getRemaining()}</p>");
        }
    } 
    ?>
    </div>
</body>
</html>