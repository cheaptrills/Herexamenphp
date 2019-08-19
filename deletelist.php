<?php
require_once("autoload/autoload.php");
if(isset($_GET["listid"])){

    $listid = $_GET["listid"];
}else {
    header("location: index.php");
}
$userid = Daluser::getUserId();
$deletelist = Dallist::deleteList($userid,$listid);
header("location: index.php");
?>