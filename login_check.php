<?php
session_start();
require_once 'database.php';
$email = $_POST['email'];
$password = $_POST['password'];

    $query1 = "SELECT * FROM users WHERE email=?";
    $stmt1 = $pdo->prepare($query1);
    $stmt1->execute([$email]);    
    $countU = $stmt1->rowCount();
    $query2="SELECT * FROM kurirs WHERE email=?";
    $stmt2=$pdo->prepare($query2);
    $stmt2->execute([$email]);
    $countK = $stmt2->rowCount();

    if($countU==1)
    {
        $user=$stmt1->fetch();
        if(password_verify($password, $user['password']))
        {
            $_SESSION['user_id']=$user['user_id'];
            $_SESSION['username']=$user['username'];
            $_SESSION['email']=$user['email'];
            $_SESSION['phone']=$user['phone'];
            $_SESSION['type']=0;
            header("location: index.php");
        }
        else
        {
            header("location: login.php");
        }
    }
    else if($countK==1)
    {
        $kurir=$stmt2->fetch();
        if(password_verify($password, $kurir['password']))
        {
            $_SESSION['kurir_id']=$kurir['kurir_id'];
            $_SESSION['username']=$kurir['username'];
            $_SESSION['email']=$kurir['email'];
            $_SESSION['phone']=$kurir['phone'];
            $_SESSION['type']=1;
            header("location: index.php");
        }
        else
        {
            header("location: login.php");
        }
    }
    else
    {
        echo "Email doesn't exist";
    }
    

    
?>
