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
    <link rel="stylesheet" href="style/index.css">
    <title>Vince's to do </title>
</head>
<body>
<div class="blok">
<p>Vince's To-Do list application</p>
    <a href="addlist.php" class="add">add list</a>
    <p>Current lists</p>
        <?php
            foreach($lists as $list){
                echo("<p><a class='list' href='list.php?listid={$list->getId()}'>{$list->getTitle()}</a> </p>");
            }
        ?>
</div>
</body>
</html>