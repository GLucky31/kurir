<?php
include_once './database.php';
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['type'])){

//defajnu spremenljivke
$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];
$type = $_POST['type'];
$pass = password_hash($pass1, PASSWORD_DEFAULT);
echo  $type;
if($type==1){
    $query="SELECT * FROM users WHERE email=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$email]);
    $countU = $stmt->rowCount();
    $query ="SELECT * FROM kurirs WHERE email=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$email]);
    $countK = $stmt->rowCount();
    if($countU==0 && $countK==0){
        if($pass1==$pass2){
            $query = "INSERT INTO users (username, phone, email, password) VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$username, $phone, $email, $pass]);
            header("Location: login.php");
        }
        else{
            echo "Passwords don't match";
        }
    }
    else{
        echo "Email already exists";
    }
}
else{
    $query="SELECT * FROM users WHERE email=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$email]);
    $countU = $stmt->rowCount();
    $query ="SELECT * FROM kurirs WHERE email=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$email]);
    $countK = $stmt->rowCount();
    if($countU==0 && $countK==0){
        if($pass1==$pass2){
            $query = "INSERT INTO kurirs (username, phone, email, password) VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$username, $phone, $email, $pass]);
            header("Location: login.php");
        }
        else{
            echo "Passwords don't match";
        }
    }
    else{
        echo "Email already exists";
    }
}
}
else{
    echo "Please fill all fields";
}
?>
