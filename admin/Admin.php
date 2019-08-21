<?php
require_once("../autoload/autoload.php");
try{
    User::userLoggedIn();
}catch( Exception $e){
    $error = $e->getMessage();
}
try{
    $user = Daluser::getUserByName($_SESSION["username"]);
    if(!$user->getIsAdmin()){
        header("Location: ../index.php");
    }
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
    <title>Admin</title>
</head>
<body>
    <div>
        <h1>Welcome to the admin page: <?php echo $user->getUsername() ?></h1>
        <div>
            <p>Registerd users: <?php echo Daluser::getUserCount() ?></p>
            <ul>
                <?php
                    $users = DalUser::getAllUsers();
                    foreach($users as $us){
                        ?>
                            <li><?php echo $us->getUsername() ?> - 
                                <?php if(!$us->getIsAdmin()){ ?>
                                    <a href="makeadmin.php?id=<?php echo $us->getId()?>">Make admin</a>
                                <?php } else { ?>
                                    <a href="removeadmin.php?id=<?php echo $us->getId()?>">Remove admin</a>
                                <?php } ?>
                            </li>
                        <?php
                    }
                ?>
            </ul>
        </div>
        <div>
            <p>Total lists: <?php echo Dallist::getListCount() ?></p>
        </div>
    </div>
</body>
</html>