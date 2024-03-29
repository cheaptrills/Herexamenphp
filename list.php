<?php
require_once("autoload/autoload.php");
if(isset($_GET["listid"])){

    $listid = $_GET["listid"];

}else {
    header("location: index.php");
}
try{
    
    $lists = Dallist::getListById($listid);

}catch( Exception $e){
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/bootstrap.css">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="table">
        <?php if (isset($error)): ?>
            <div class="formError">
                <p>
                    <?php echo $error ?>
                </p>
            </div>
        <?php endif; ?>
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
                    <th onclick="sortTable()" class='btn btn-primary'>werkdruk</th>
                    <th>mark</th>
                    <th>delete</th>
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
                            <td>
                                <div class='time'>{$todo->getWork()}</div>
                            </td>
                            <td>
                                <button class='markbutton btn btn-primary' data-id='{$todo->getId()}'>Mark</button>
                            </td>
                            <td>
                                <a class='btn btn-danger delete' href='deletetask.php?taskid={$todo->getId()}'>Delete</a>
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
    <script src="js/comment.js"></script>
    <script src="js/sort.js"></script>
</body>
</html>