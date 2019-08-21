<?php
require_once("autoload/autoload.php");

if(isset($_GET["taskid"])){

    $taskid = $_GET["taskid"];
}else {
    header("location: index.php");
}
try{
$userid = Daluser::getUserId();
$deletetask = Daltask::deleteTask($userid,$taskid);
}catch( Exception $e){
    $error = $e->getMessage();
}
echo "<script>window.history.back();</script>";
?>