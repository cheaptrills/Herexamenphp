<?php
require_once("autoload/autoload.php");
User::userLoggedIn();

$user = Daluser::getUserByName($_SESSION["username"]);
if(!$user->getIsAdmin()){
    header("Location: index.php");
}
if(!isset($_GET["id"])){
    header("Location: admin.php");
}

$userId=$_GET["id"];
$updateUser = DalUser::getUserById($userId);

$updateUser->setIsAdmin(true);
DalUser::UpdateUser($updateUser);

header("Location: admin.php");