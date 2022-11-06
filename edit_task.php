<?php include "database.php";
session_start();
$query="SELECT * FROM tasks WHERE task_id=?";
$stmt=$pdo->prepare($query);
$stmt->execute([$_GET['id']]);
$task=$stmt->fetch();
if($task['user_id']==$_SESSION['user_id'])
{
  echo "<form action='edited_task.php?id=".$_GET['id']."' method='POST'>";
    echo "<div class='form-group'>";
    echo "<label for='task_description'>Task description</label>";
    echo "<input type='text' class='form-control' id='task_description' name='task_description' value='".$task['task_description']."'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='location'>Location</label>";
    echo "<input type='text' class='form-control' id='location' name='location' value='".$task['location']."'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='date'>Date</label>";
    echo "<input type='date' class='form-control' id='date' name='date' value='".$task['date']."'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='time'>Time</label>";
    echo "<input type='time' class='form-control' id='time' name='time' value='".$task['time']."'>";
    echo "</div>";
    echo "<button type='submit' class='btn btn-primary'>Submit</button>";
    echo "</form>";
}
else
{
    header("Location: my_tasks.php");
}