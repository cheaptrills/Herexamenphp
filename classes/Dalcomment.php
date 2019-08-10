<?php

class Dalcomment {

    public static function createComment($comment,$userid,$taskid){

        $c = new Comment();
        $c->setComment($comment);
        $c->setTaskid($taskid);
        $c->setUserid($userid);
        self::uploadComment($c);

    }

    public static function uploadComment(Comment $comment){

        $conn = Db::getConnection();
        // insert all post-information to database
        $statement = $conn->prepare("insert into comment (`comment`,`userid`,`taskid`) VALUES (:comment,:userid,:taskid)");
        $statement->bindValue(":comment", $comment->getComment());
        $statement->bindValue(":userid", $comment->getUserid());
        $statement->bindValue(":taskid", $comment->getTaskid());
        $result = $statement->execute();

    }

    //getallcomments
    //getcommentsbytaskid
    //getcommentsbyuserid

    public static function getCommentById(int $id){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from comment WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $comment = new Comment();
        $comment->setComment($result["comment"]);
        $comment->setId($result["id"]);
        $comment->setTask(Daltask::getTasksById($result["taskid"]));
        $comment->setUser(Daluser::getUserById($result["userid"]));
        return $comment;

    }

    public static function getComments(){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from comment");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];

        foreach($results as $result){

            $comment = new Comment();
            $comment->setComment($result["comment"]);
            $comment->setId($result["id"]);
            $comment->setTask(Daltask::getTasksById($result["taskid"]));
            $comment->setUser(Daluser::getUserById($result["userid"]));
            array_push($comments,$comment);
        }
        return $comments;

    }

    public static function getCommentsByTaskId(int $taskid){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from comment WHERE taskid = :taskid");
        $statement->bindParam(":taskid", $taskid);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];

        foreach($results as $result){

            $comment = new Comment();
            $comment->setComment($result["comment"]);
            $comment->setId($result["id"]);
            $comment->setTask(Daltask::getTasksById($result["taskid"]));
            $comment->setUser(Daluser::getUserById($result["userid"]));
            array_push($comments,$comment);
        }
        return $comments;

    }

    public static function getCommentsByUserId(int $Userid){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from comment WHERE userid = :userid");
        $statement->bindParam(":userid", $userid);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];

        foreach($results as $result){

            $comment = new Comment();
            $comment->setComment($result["comment"]);
            $comment->setId($result["id"]);
            $comment->setTask(Daltask::getTasksById($result["taskid"]));
            $comment->setUser(Daluser::getUserById($result["userid"]));
            array_push($comments,$comment);
        }
        return $comments;

    }
}