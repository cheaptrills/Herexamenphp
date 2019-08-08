<?php

class Daltask {

    public static saveTask($title,$description,$date,$workload){

        $conn = Db::getConnection();
        $user_id = Daluser::getUserId();
        $conn->beginTransaction();

        $statement = $conn->prepare("insert into task (`title`,'description','date','workload') VALUES (:title,:description,:date,:workload)");
        $statement->bindParam(":title", $title);
        $statement->bindParam(":description", $description);
        $statement->bindParam(":date", $date);
        $statement->bindParam(":workload", $workload);
        $result = $statement->execute();
        $conn->commit();
        return $conn->lastInsertId();
    }

    



}