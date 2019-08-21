<?php
require_once("autoload/autoload.php");
try{
    User::userLoggedIn();
}catch( Exception $e){
    $error = $e->getMessage();
}

if (isset($_POST['upload'])){

    $title = $_POST['title'];

    try{
        Dallist::saveList($title);
        header("location:index.php");

    }catch( Exception $e){
        $error = $e->getMessage();
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style/bootstrap.css">
    <title>add list</title>
</head>

<body class="post">
    <div class="container">
    <?php if (isset($error)): ?>
        <div class="formError">
            <p>
                <?php echo $error ?>
            </p>
        </div>
    <?php endif; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="flexbox postPage">
            <h1>Add list</h1>

            <div class="form-group">
                <label for="title">title</label>
                <textarea id="title" name="title" rows="1" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="upload" class="btn btn-primary">add list<i class="hidden" id="loaderIcon"></i></button>
            </div>
        </div>
    </form>
</body>
</html>