<?php

class Dallist{
    
    public static function saveList($title)
    {
        // get a connection with the database
        $conn = Db::getConnection();
        $user_id = Daluser::getUserId();
        // insert all post-information to database
        $statement = $conn->prepare("insert into list (`name`) VALUES (:name)");
        $statement->bindParam(":name", $title);
        $result = $statement->execute();
    }

    public static function getList($title){



    }

    public static function getLists(){


    }
}