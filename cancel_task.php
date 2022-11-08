<?php session_start();
include 'database.php';
$id=$_GET['id'];
$query = "SELECT * FROM tasks WHERE kurir_id = ? AND task_id = ?";
$stmt = $pdo -> prepare($query);
$stmt->execute([$_SESSION['kurir_id'], $id]);
$user=$stmt->fetch();
$count = $stmt->rowCount();
if($count==1)
{
    $query="UPDATE tasks SET kurir_id=NULL WHERE task_id=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$id]);
    header("Location: task_list.php");
}
else
{
    header("Location: task_list.php");
}
