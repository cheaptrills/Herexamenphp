<?php
require_once("autoload/autoload.php");
$lists = Dallist::getLists();
?>
<p>index omdat het moet van daphne en haar grote armen</p>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vince'es to do </title>
</head>
<body>
    <a href="addlist.php">add list</a>
    <?php
    foreach($lists as $list){
        echo("<p>{$list->getTitle()}</p>");
    }
    ?>
</body>
</html>