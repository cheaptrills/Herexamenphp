<?php
require_once("autoload/autoload.php");
User::userLoggedIn();

if (isset($_POST['upload'])){

    $title = $_POST['title'];

    try{
        Dallist::saveList($title);

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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/cssgram.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>add list</title>
</head>

<body class="post">
<form action="" method="POST" enctype="multipart/form-data">
    <?php if (isset($error)): ?>
        <div class="formError">
            <p>
                <?php echo $error ?>
            </p>
        </div>
    <?php endif; ?>
    <div class="flexbox postPage">
        <h2 formTitle>Add list</h2>

        <div class="formField">
            <label for="title">title</label>
            <textarea id="title" name="title" rows="10"></textarea>
        </div>
        <div class="formField">
            <button type="submit" name="upload" class="btn btnPrimary btnPost">add list<i class="hidden" id="loaderIcon"></i></button>
        </div>
    </div>
</form>
<script src="js/postLocation.js"></script>
<script src="js/navigation.js"></script>
<script src="js/showUploadedImage.js"></script>
<script src="js/addFilter.js"></script>
<script src="js/loading.js"></script>
</body>
</html>