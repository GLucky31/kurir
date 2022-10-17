<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <meta charset="utf-8">
    <title>MYSTBOX</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
     <div id="background">
        <div class="Container">
            <div class="register">
                <h1>CREATE AN ACCOUNT</h1>
                <form action="user_insert.php" method="post">
                    <input class="input" type="text" name="username" placeholder="Name" required="required">
                    <input class="input" type="text" name="email" placeholder="E-mail" required="required">
                    <input class="input" type="text" name="phone" placeholder="Phone" required="required">
                    <input class="input" type="password" name="password1" placeholder="Password" required="required">
                    <input class="input" type="password" name="password2" placeholder="Confirm Password" required="required">
                    <label for="type">Choose your account type:</label>
                        <select name="type" id="type" class="select">
                            <option value="1">User</option>
                            <option value="2">Kurir</option>
                        </select>
                    <p>Registered user?</p><a href="login.php">Log in</a>
                    <div>
                    <button type="submit" class="button">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once 'footer.php'?>
