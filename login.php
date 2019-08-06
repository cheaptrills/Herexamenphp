<?php
require_once("autoload/autoload.php");

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(User::canLogin($username, $password)){
        User::doLogin($username);
    } else {
        $error = true;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <title>login</title>
</head>

<body class="loginPage">


    <div class="login">
        <div class="form formLogin">
            <form action="" method="post">
                <h2 class="formTitle">Login</h2>

                <?php if (isset($error)): ?>
                <div class="formError">
                    <p>
                        Sorry, we can't log you in with that username and password. Can you try again?
                    </p>
                </div>
                <?php endif; ?>
                <div class="formInput">
                    <div class="formField">
                        <label for="username">username</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <div class="formField">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>

                    <div class="formField">
                        <input type="submit" value="login" class="btn btnPrimary">
                        <!--                <input type="checkbox" id="rememberMe"><label for="rememberMe" class="labelInline">Remember me</label>-->
                    </div>
                </div>

                <div class="redirectLink">
                    <p>No account yet? <a href="register.php"> Sign up here</a></p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>