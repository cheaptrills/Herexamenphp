<?php
require_once("autoload/autoload.php");
try{
$lists = Dallist::getLists();
}catch( Exception $e){
    $error = $e->getMessage();
}
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
    <?php if (isset($error)): ?>
            <div class="formError">
                <p>
                    <?php echo $error ?>
                </p>
            </div>
    <?php endif; ?>
    <a href="logout.php" class="btn btn-primary" id="logout">Logout</a>
    <div class="container">
    <div class="create-group">
            <a href="addlist.php" class="btn btn-success">add list</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($lists as $list){
                    //remove if voor gezamelijke lijst
                    if($list->getUserId()==Daluser::getUserId()){
                        echo("
                        <tr>
                            <td>
                                <a class='list' href='list.php?listid={$list->getId()}'>{$list->getTitle()}</a>
                            </td>
                            <td>
                                <a class='btn btn-danger delete' href='deletelist.php?listid={$list->getId()}'>Delete</a>
                            </td>
                        
                        </tr>");
                    }
                }
            ?>
        </tbody>
    </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/createlist.js"></script>
</body>