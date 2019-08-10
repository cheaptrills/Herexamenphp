<?php

class Daltask {

    public static function saveTask($title,$date,$workload,$listid){

        $conn = Db::getConnection();
        $user_id = Daluser::getUserId();
        $conn->beginTransaction();

        $statement = $conn->prepare("insert into todo (`title`,`date`,`work`,`listid`,`userid`) VALUES (:title,:date,:workload,:listid,:userid)");
        $statement->bindParam(":title", $title);
        $statement->bindParam(":date", $date);
        $statement->bindParam(":workload", $workload);
        $statement->bindParam(":listid", $listid);
        $statement->bindParam(":userid", $user_id);
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
    public static function getTaskByTitle($title){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from todo WHERE name = :name");
        $statement->bindParam(":name", $title);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $task = new Task();
        $task->setTitle($result["name"]);
        $task->setId($result["id"]);
        $task->setDate($result["date"]);
        $task->setWork($result["work"]);
        $task->setListid($result["listid"]);
        

        return $task;

    }
    public static function getTasksByListId($listid){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from todo WHERE listid = :id");
        $statement->bindParam(":id", $listid);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $items = [];

        foreach($result as $item){
            $task = new Task();
            $task->setTitle($item["title"]);
            $task->setId($item["id"]);
            $task->setDate($item["date"]);
            $task->setWork($item["work"]);
            $task->setListid($item["listid"]);
            array_push($items,$task);
        }
        return $items;

    }
    public static function getTasks(){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from todo");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $items = [];

        foreach($result as $item){
            $task = new Task();
            $task->setTitle($item["title"]);
            $task->setId($item["id"]);
            $task->setDate($item["date"]);
            $task->setWork($item["work"]);
            $task->setListid($item["listid"]);
            array_push($items,$task);
        }
        return $items;
    }

    public static function getTasksByUserId($userid){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from todo WHERE userid = :id");
        $statement->bindParam(":id", $userid);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $items = [];

        foreach($result as $item){
            $task = new Task();
            $task->setTitle($item["title"]);
            $task->setId($item["id"]);
            $task->setDate($item["date"]);
            $task->setWork($item["work"]);
            $task->setListid($item["listid"]);
            array_push($items,$task);
        }
        return $items;

    }

    public static function getTasksById(int $id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from todo WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $task = new Task();
        $task->setTitle($result["title"]);
        $task->setId($result["id"]);
        $task->setDate($result["date"]);
        $task->setWork($result["work"]);
        $task->setListid($result["listid"]);
        

        return $task;
    }
}