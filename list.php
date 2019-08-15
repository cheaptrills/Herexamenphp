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
    <link rel="stylesheet" href="style/list.css">
    <title>Document</title>
</head>
<body>
    <div class="blok">
        <p>title: <?php echo($lists->getTitle());  ?></p>
            <div>
                <a href="addtask.php?listid=<?php echo($listid) ?>">Add Task</a>
            </div>
            <div>
                <a href="done.php?listid=<?php echo($listid) ?>">Done tasks</a>
            </div>
            <div>
                <?php 
                foreach($lists->getTodos() as $todo){
                    if(!$todo->getDone()){
                        echo("<p class='task'>
                                <a class='item' href='task.php?taskid={$todo->getId()}'>{$todo->getTitle()}</a> 
                                <div class='time'>{$todo->getRemaining()}</div>
                              </p>");
                    }
                } 
                ?>
            </div>   
    </div>
</body>
</html>