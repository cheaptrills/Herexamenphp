<?php
require_once("autoload/autoload.php");

User::userLoggedIn();

if (isset($_POST['upload'])){



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
    <title>IMSTAGRAM - add post</title>
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
        <h2 formTitle>Add task</h2>

        <div class="formField">
            <label for="title">Title</label>
            <textarea id="title" name="title" rows="1"></textarea>
        </div>

        <div class="formField">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="10"></textarea>
        </div>

        <div class="formField">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" >
        </div>

        <div class="formField">
            <label for="workload">workload</label> 
            <div class="workload">
                <input type="range" min="1" max="20" id="workload" name="workload">
            </div>

        </div>

        <div class="formField">
            <label for="file">add files</label> 
            <div class="file">
                <input type="file" id="file" name="file[]">
            </div>

        </div>

        <div class="formField">
            <button type="submit" name="upload" class="btn btnPrimary btnPost">addtask<i class="hidden" id="loaderIcon"></i></button>
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