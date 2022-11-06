<?php start_session();
include "database.php";
$query="SELECT * FROM tasks WHERE task_id=?";
$stmt=$pdo->prepare($query);
$stmt->execute([$_GET['id']]);
$task=$stmt->fetch();
if($task['user_id']==$_SESSION['user_id'])
{
    $query="DELETE FROM tasks WHERE task_id=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$_GET['id']]);
    header("Location: my_tasks.php");
else
{
    header("Location: my_tasks.php");
}