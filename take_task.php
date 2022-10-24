<?php 
session_start();
include "database.php";
$kid=$_SESSION['kurir_id'];
$tid=$_GET['id'];

$query="SELECT * FROM tasks WHERE kurir_id=?";
$stmt=$pdo->prepare($query);
$stmt->execute([$kid]);
$count=$stmt->rowCount();
if($count==0)
{
    $query="UPDATE tasks SET kurir_id=? WHERE task_id=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$kid,$tid]);
    header("Location: kurir.php");
}
else{
    echo "You already have a task";
}
