<?php
try {
    if(isset($_POST["edit"])){
        $description = htmlspecialchars($_POST["description"]);
        if((!isset($description) || trim($description) === '')){

        }else{
            if(Post::editPost($uid, $id, $description)){
                header("Location: /details.php?id=$id");
            }
        }
    }
    if(isset($_POST["delete"])){
        if(Post::deletePost($id, $uid)){
        header("Location: /");
        }
    }
} 
catch (\PDOException $e){
    // Log to error file
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<div class="formField">

<label for="description">Edit title</label>
<textarea rows="1" id="title" name="title" class="textarea"><?php echo $post['title']; ?></textarea>
</div>

<input type="submit" value="Update post" name="edit" class="btn btnPrimary">
<input type="submit" value="remove post" name="delete" class="btn btnPrimary">

</body>
</html>