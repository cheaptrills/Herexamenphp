<?php
require_once("Db.php");
require_once("Security.php");

class User
{
    private $username;
    private $email;
    private $password;
    private $passwordConfirmation;


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
        //Check if not empty
        if( empty($username) ){
            throw new Exception("Username cannot be empty.");
        }

        //Check if username is not longer than 30chars
        if( User::maxLength($username, 30)){
            throw new Exception("Username cannot be longer than 30 characters.");
        }

        //Check if username is not in our DB yet
        if( !User::isUsernameAvailable($username) ){
            throw new Exception("This username is already registered.");
        }
        
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
        if( $this->getPassword() !== $passwordConfirmation){
            //Passwords do not equal, throw exception
            throw new Exception("Password fields are not equal, please enter them again");
        }

        $this->passwordConfirmation = $passwordConfirmation;
        return $this;
    }

    