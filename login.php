<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <meta charset="utf-8">
    <title>MYSTBOX</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
     <div id="background">
        <div class="Container">
            <div class="login">
                <h1>LOG IN</h1>
                <form action="login_check.php" method="post">
                    <input class="input" type="text" name="email" placeholder="E-mail" required="required">
                    <input class="input" type="password" name="password" placeholder="Password" required="required">
                    <a href="psw.html">Forgot your password?</a>
                    <div>
                    <button type="submit" class="button">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once 'footer.php'?>