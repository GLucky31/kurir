<?php session_start();
include "database.php";
if(isset($_SESSION['type']))
{
if($_SESSION['type']==0)
{
    $query="SELECT * FROM tasks WHERE user_id=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$_SESSION['user_id']]);
    $tasks=$stmt->fetchAll();
    foreach($tasks as $task)
    {
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>Task description: ".$task['task_description']."</h5>";
        echo "<h6 class='card-subtitle mb-2 text-muted'>Location: ".$task['location']."</h6>";
        echo "<p class='card-text'>Date: ".$task['date']."</p>";
        echo "<p class='card-text'>Time: ".$task['time']."</p>";
        echo "<a href='delete_task.php?id=".$task['task_id']."' class='card-link'>Delete</a>";
        echo "<a href='edit_task.php?id=".$task['task_id']."' class='card-link'>Edit</a>";
        echo "</div>";
        echo "</div>";
    }
}
else
{
    header("Location: kurir.php");
}
}
else
{
    header("Location: index.php");
}