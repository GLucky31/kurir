<?php session_start();
include 'database.php';
$id=$_GET['id'];
$query = "SELECT * FROM tasks WHERE user_id = ? AND task_id = ?";
$stmt = $pdo -> prepare($query);
$stmt->execute([$_SESSION['user_id'], $id]);
$user=$stmt->fetch();
$count = $stmt->rowCount();
if($count == 1){
    $query = "UPDATE tasks SET  WHERE task_id = ? AND user_id = ?";
}
else{
   header("Location: my_tasks.php");
}?>