<?php include "database.php";
session_start();
if(isset($_GET['id'])){
    $query = "SELECT * FROM notifications WHERE notification_id = ?";
    $stmt = $pdo -> prepare($query);
    $stmt->execute([$_GET['id']]);
    $notification=$stmt->fetch();
    if($_SESSION['user_id']==$notification['user_id']){
        $query="DELETE FROM notifications WHERE notification_id=?";
        $stmt=$pdo->prepare($query);
        $stmt->execute([$_GET['id']]);
        header("Location: index.php");
    }
    else{
        header("Location: index.php");
    }
}
else{
    header("location: index.php");
}