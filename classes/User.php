<?php

class User
{
    private $username;
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
    
}