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
    <link rel="stylesheet" href="style/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="table">
        <h1>title: <?php echo($lists->getTitle());  ?></h1>
        <div>
             <a class='btn btn-primary' href="addtask.php?listid=<?php echo($listid) ?>">Add Task</a>
        </div>
        <div>
            <a class='btn btn-primary' href="done.php?listid=<?php echo($listid) ?>">Done tasks</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>task</th>
                    <th>remaining</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($lists->getTodos() as $todo){
                    if(!$todo->getDone()){
                        echo(
                            "<tr>
                            <td>
                                <a class='item' href='task.php?taskid={$todo->getId()}'>{$todo->getTitle()}</a> 
                            </td>
                            <td>
                                <div class='time'>{$todo->getRemaining()}</div>
                            </td>
                            </tr>"
                        );
                    }
                } 
                ?>
            </tbody>   
        </table>
    </div>
    </div>
</body>
</html>