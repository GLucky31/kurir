<?php

include 'database.php';
    if(isset($_POST['btn'])){
session_start();
$desc=$_POST['task_description'];
$loca=$_POST['location'];
$date=$_POST['date'];
$time=$_POST['time'];
$user_id=$_SESSION['user_id'];

if(isset($desc)&&isset($loca)&&isset($date)&&isset($time)&&isset($user_id)){
    $query = "INSERT INTO tasks (task_description,location,date,time,user_id) VALUES (?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$desc,$loca,$date,$time,$user_id]);
    
}
else{
    
}
       
    }
?>


