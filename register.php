<?php
    require_once("bootstrap/bootstrap.php");

    if( !empty($_POST) ){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];

            //Try to start new user obj, set properties and call the register function
            try{
                $user = new User();

                $user->setUsername($username);
                $user->setPassword($password);
                $user->setPasswordConfirmation($passwordConfirm);

                if( $user->register() ){
                    $user->firstLogin();
                }

            }catch( Exception $e){
                $error = $e->getMessage();
            }
    }
    

?>