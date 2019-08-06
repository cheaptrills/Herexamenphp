<?php 
    require_once("autoload/autoload.php");

    if( !empty($_POST) ){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];

            //Try to start new user obj, set properties and call the register function
            try{
                Daluser::createUser($username,$password,$passwordConfirm);

            }catch( Exception $e){
                $error = $e->getMessage();
            }
    }
    

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>register</title>
</head>
<body class="registerPage">

<div class="register">
    <div class="form formLogin formRegister">


        <form action="" method="post">
            <h2 class="formTitle">Signup</h2>

            <?php if (isset($error)): ?>
                <div class="formError">
                    <p>
                        <?php echo $error ?>
                    </p>
                </div>
            <?php endif; ?>

            <div class="formInput">
                <div class="formField">
                    <label for="username">Username</label>
                    <p id="usernameFeedback" class="ajaxFeedback hidden"></p>
                    <input type="text" id="username" name="username">
                </div>
                <div class="formField">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="formField">
                    <label for="passwordConfirm">Password Confirmation</label>
                    <input type="password" name="passwordConfirm" id="passwordConfirm">
                </div>

                <div class="formField">
                    <input type="submit" value="Sign up" class="btn btnPrimary">
                </div>
            </div>

            <div class="redirectLink">
                <p>Already have an account? <a href="login.php"> Log in here</a></p>
            </div>
        </form>
    </div>
</div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="js/register.js"></script>

</body>
</html>