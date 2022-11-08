<?php session_start();
include "header.php";
include "database.php";
if(isset($_SESSION['type']))
{
if($_SESSION['type']==0)
{ include "nav.php";
    
    $query="SELECT * FROM tasks WHERE user_id=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$_SESSION['user_id']]);
    $tasks=$stmt->fetchAll();
    foreach($tasks as $task)
    {
        echo 
        
        "<div class='container'><div class='row'><div class='card'>
    <div class='card-body'>
        <h5 class='card-title'>Task description: ".$task['Task_description']."</h5>
        <p class='card-text'>Location: ".$task['Location']."</p>
        <p class='card-text'>Date: ".$task['Date']."</p>
        <p class='card-text'>Time: ".$task['Time']."</p>
        <a href='delete_task.php?id=".$task['task_id']."' class='card-link'>Delete</a>
        <a href='edit_task.php?id=".$task['task_id']."' class='card-link'>Edit</a>
    </div>
    </div></div></div>";
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
