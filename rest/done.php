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
    <title>Done tasks</title>
</head>
<body>
    <div>
        <p>title: <?php echo($lists->getTitle());  ?></p>
    </div>
    <div>
        <thead>
            <tr>
                <th>task</th>
                <th>unmark</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($lists->getTodos() as $todo){
                    if($todo->getDone()){
                        echo(
                            "<tr>
                            <td>
                                <a href='task.php?taskid={$todo->getId()}'>{$todo->getTitle()}</a>
                            </td>
                            <td>
                                <button class='markbutton btn btn-primary' data-id='{$todo->getId()}'>Mark</button>
                            </td>
                            </tr>"
                        );
                    }
                } 
            ?>
        </tbody>
    </div>
    <script src="js/comment.js"></script>
</body>
</html>