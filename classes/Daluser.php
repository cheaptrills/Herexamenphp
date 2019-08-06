<?php

class Daluser {

    public static function findByUsername($username)
    {
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where username = :username limit 1");
        $statement->bindParam(":username", $username);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function isUsernameAvailable($username)
    {
        $result = self::findByUsername($username);

        // PDO returns false if no records are found so let's check for that
        if ($result == false) {
            return true;
        } else {
            return false;
        }
    }

    public static function createUser($username,$password,$passwordConfirm)
    {
        $user = new User();

        if( empty($username) ){
            throw new Exception("Username cannot be empty.");
        }

        //Check if username is not longer than 30chars
        if( User::maxLength($username, 30)){
            throw new Exception("Username cannot be longer than 30 characters.");
        }

        //Check if username is not in our DB yet
        if( !Daluser::isUsernameAvailable($username) ){
            throw new Exception("This username is already registered.");
        }

        

        $user->setUsername($username);
        $user->setPassword($password);
        $user->setPasswordConfirmation($passwordConfirm);
        var_dump($user);

        Daluser::createUserWithUser($user);
    }

    public static function createUserWithUser(User $user) 
    {
        $conn = Db::getConnection();
        $statement = $conn->prepare("INSERT INTO user(username,password) values (:username, :password )");
        $statement->bindValue(":username", $user->getUsername());
        $statement->bindValue(":password", $user->getPassword());
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
