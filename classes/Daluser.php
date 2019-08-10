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

        Daluser::createUserWithUser($user);
    }

    public static function createUserWithUser(User $user) 
    {
        $conn = Db::getConnection();
        $statement = $conn->prepare("INSERT INTO user(username,password) values (:username, :password )");
        $statement->bindValue(":username", $user->getUsername());
        $statement->bindValue(":password", Security::hash($user->getPassword()));
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function login($username, $password){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where username = :username");
        $statement->bindParam(":username", $username); # the username parameter is bound to :username to prevent sql-injection
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);


        if (password_verify($password, $user['password'])) {
            echo("true");
            $_SESSION['username'] = $username;
            header("location: index.php");
            return true;
        } else {
            return false;
        }
    }

    public static function getUserId()
    {
        $sessionUsername = $_SESSION['username'];

        $conn = Db::getConnection();
        $statement = $conn->prepare("select id from user where username = :username");
        $statement->bindParam(":username", $sessionUsername);
        $statement->execute();
        $user_id = $statement->fetch(PDO::FETCH_ASSOC);
        $user_id = $user_id['id'];
        return $user_id;

    }

    public static function getUserByName(string $name){

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where username = :username");
        $statement->bindParam(":username", $name);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $user = new user();
        $user-> setUsername($result["username"]);
        $user-> setPassword($result["password"]);
        $user-> setIsAdmin($result["isAdmin"]);
        $user-> setId($result["id"]);
        return $user;
    }

    public static function getAllUsers(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach($result as $rUser){
            $user = new User();
            $user-> setUsername($rUser["username"]);
            $user-> setPassword($rUser["password"]);
            $user-> setIsAdmin($rUser["isAdmin"]);
            $user-> setId($rUser["id"]);
            array_push($users, $user);
        }
        return $users;
    }
    
    public static function getUserById($id){
        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from user where id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        $user = new user();
        $user-> setUsername($result["username"]);
        $user-> setPassword($result["password"]);
        $user-> setIsAdmin($result["isAdmin"]);
        $user-> setId($result["id"]);
        return $user;
    }

    public static function UpdateUser(User $u){
        // UPDATE `user` SET `password`=:password,`isAdmin`=:isAdmin WHERE id = :id
        $conn = Db::getConnection();
        $statement = $conn->prepare("UPDATE `user` SET `password`=:password,`isAdmin`=:isAdmin WHERE id = :id");
        $statement->bindParam(":id", $u->getId());
        $statement->bindParam(":password", $u->getPassword());
        $statement->bindParam(":isAdmin", $u->getIsAdmin());
        return $statement->execute();
    }

    public static function getUserCount(){
        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT count(*) AS uCount FROM user");
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result["uCount"];
    }
}
 