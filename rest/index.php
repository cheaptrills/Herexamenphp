<?php
require_once("autoload/autoload.php");
$lists = Dallist::getLists();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/bootstrap.css">
    <title>Vince's to do</title>
</head>
<body>
<div class="container">
    <div class="cars-title">Vince's To-Do list application</div>
    <a href="addlist.php" class="btn btn-primary white">add list</a>
    <a href="logout.php" class="btn btn-primary white">logout</a>
    <div id="center">
    <p>Current lists</p>
    </div>
        <?php
            foreach($lists as $list){
                echo("<p><a class='list' href='list.php?listid={$list->getId()}'>{$list->getTitle()}</a> </p>");
            }
        ?>
</div>
</body>
</html>