<?php
require_once("autoload/autoload.php");
if(isset($_GET["listid"])){

    $listid = $_GET["listid"];
}else {
    header("location: index.php");
}
$userid = Daluser::getUserId();
$deletetask = Daltask::deleteTask($userid,$taskid);
header("location: list.php");
?>