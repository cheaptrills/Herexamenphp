<?php

class Daltask {

    public static function saveTask($title,$date,$workload,$listid){

        $conn = Db::getConnection();
        $user_id = Daluser::getUserId();
        $conn->beginTransaction();

        $statement = $conn->prepare("insert into todo (`title`,`date`,`work`,`listid`) VALUES (:title,:date,:workload,:listid)");
        $statement->bindParam(":title", $title);
        $statement->bindParam(":date", $date);
        $statement->bindParam(":workload", $workload);
        $statement->bindParam(":listid", $listid);
        $result = $statement->execute();
    
        $lstId = $conn->lastInsertId();
        $conn->commit();
        return $lstId;
    }

    public static function saveFile($task,$name,$path){

        $conn = Db::getConnection();
        $user_id = Daluser::getUserId();
        $statement  = $conn->prepare("insert into file(`task_id`,`filepath`,`filename`) VALUES (:taskId,:filepath,:filename)");
        $statement->bindParam(":taskId", $task);
        $statement->bindParam(":filepath", $path);
        $statement->bindParam(":filename", $name);
        $result = $statement->execute();

    }

}