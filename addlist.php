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
<?php include_once("nav.incl.php"); ?>
<form action="" method="POST" enctype="multipart/form-data">
    <?php if (isset($error)): ?>
        <div class="formError">
            <p>
                <?php echo $error ?>
            </p>
        </div>
    <?php endif; ?>
    <div class="flexbox postPage">
        <h2 formTitle>Add post</h2>


        <div class="formField">
            <label for="image">Upload a picture</label>
            <div class="uploadFileWrapper">
                <input type="file" id="image" name="image">
            </div>

        </div>

        <div class="imageWrapper">
            <figure>
                <img id="output" class="uploadedImage" visibility="hidden"/>
            </figure>
        </div>

        <div class="formField">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="10"></textarea>
        </div>
        <div class="formField">
        <label for="category">category</label>
        <select name="category" id="category">
            <option value="0">none</option>
            <option value="1">Lineart</option>
            <option value="2">Emblems</option>
            <option value="3">Logotypes</option>
            <option value="4">Monogram Logo's</option>
            <option value="5">Brand Marks</option>
            <option value="6">Abstract Logo Marks</option>
            <option value="7">Mascots</option>
            <option value="8">Combination marks</option>
        </select>
        </div>


        <div class="formField">
            <button type="submit" name="upload" class="btn btnPrimary btnPost">Post<i class="hidden" id="loaderIcon"></i></button>
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