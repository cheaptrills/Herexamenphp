<?php
require_once("autoload/autoload.php");
if(isset($_GET["listid"])){

    $listid = $_GET["listid"];
}else {
    header("location: index.php");
}
try{
    $userid = Daluser::getUserId();
    $deletelist = Dallist::deleteList($userid,$listid);
}catch( Exception $e){
    $error = $e->getMessage();
}
header("location: index.php");
?>