<?php

class Dallist{
    
    public static function saveList($title)
    {
        // get a connection with the database
        $conn = Db::getConnection();
        $user_id = Daluser::getUserId();
        // insert all post-information to database
        $statement = $conn->prepare("insert into list (`name`,`userid`) VALUES (:name,:userid)");
        $statement->bindParam(":name", $title);
        $statement->bindParam(":userid", $user_id);
        $result = $statement->execute();
    }

    public static function getList($title){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from list WHERE name = :name");
        $statement->bindParam(":name", $title);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $list = new List();
        $list->setTitle($result["name"]);
        $list->setId($result["id"]);
        $list->setTodos(Daltask::getTasksByListId($result["id"]));
        return $list;

    }

    public static function getLists(){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from list");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $listitems = [];

        foreach($result as $item){
            $list = new List();
            $list->setTitle($item["name"]);
            $list->setId($item["id"]);
            array_push($listitems,$list);
        }
        return $listitems;
    }
}
// NONE SHALL PASS