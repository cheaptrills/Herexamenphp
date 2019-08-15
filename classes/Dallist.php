<?php

class Dallist{
    
    public static function saveList($title){
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

        $list = new Lists();
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

        foreach($result as $item) {
            $_list = new Lists();
            $_list->setTitle($item["name"]);
            $_list->setId($item["id"]);
            array_push($listitems,$_list);
        }
        return $listitems;
    }

    public static function getListById($id){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from list WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $list = new Lists();
        $list->setTitle($result["name"]);
        $list->setId($result["id"]);
        $list->setTodos(Daltask::getTasksByListId($result["id"]));
        return $list;

    }

    public static function getListCount(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT count(*) AS lCount FROM list");
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result["lCount"];
    }
}