<?php

class User implements JsonSerializable
{
    private $id;
    private $username;
    private $password;
    private $passwordConfirmation;
    private $IsAdmin;

    public function jsonSerialize(){
        return(get_object_vars ($this));
    }
/**
 * Getter for IsAdmin
 *
 * @return [type]
 */
public function getIsAdmin()
{
    return $this->IsAdmin;
}

/**
 * Setter for IsAdmin
 * @var [type] IsAdmin
 *
 * @return self
 */
public function setIsAdmin($IsAdmin)
{
    $this->IsAdmin = $IsAdmin;
    return $this;
}


     /**
     * @return id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {       
        
        $this->id = $id;
        return $this;
    }

    /**
     * @return username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     */
    public function setUsername($username)
    {       
        //username not too long, set username
        $this->username = $username;
        return $this;
    }

    /**
     * @return password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {

        //Check if not empty
        if( empty($password) ){
            throw new Exception("Password cannot be empty.");
        }

        //Check if password has minimum length of 8 chars
        if( User::minLength($password, 8)){
            throw new Exception("Password must be minimum 8 chars long.");
        }
        
        $this->password = $password;
        return $this;
    }

    /**
     * @return passwordConfirmation
     */
    public function getPasswordConfirmation()
    {
        return $this->passwordConfirmation;
    }

    /**
     * @param $passwordConfirmation
     */
    public function setPasswordConfirmation($passwordConfirmation) {

        //Check if not empty
        if( empty($passwordConfirmation) ){
            throw new Exception("Password Confirmation cannot be empty.");
        }

        //Do passwords equal?
        if( $this->getPassword() != $passwordConfirmation){
            //Passwords do not equal, throw exception
            throw new Exception("Password fields are not equal, please enter them again");
        }

        $this->passwordConfirmation = $passwordConfirmation;
        return $this;
    }

    public static function maxLength($string, $maxLength)
    {
        if (strlen($string) > $maxLength) {
            
            return true;
        } else {
            return false;
        }
    }

    public static function minLength($string, $minLength)
    {
        if (strlen($string) < $minLength) {
            //String is too short, return true for error handling
            return true;
        } else {
            return false;
        }
    }

    // check if the user is logged in
    public static function userLoggedIn() {
        if( isset($_SESSION['username']) )
        { 
            /* User is logged in, no redirect needed! */ 
        }
        else
        { /* User is not logged in, redirect to login.php! */ 
            header("location: login.php"); 
        }
    }
    
}