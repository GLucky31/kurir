<?php include 'header.php';
session_start();

?>
// list out all tasks you choose to do bootstrap card with task description, location, date, time, and a finish button
<?php
  include 'database.php';
$query = "SELECT * FROM tasks WHERE kurir_id = ? AND date =?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['kurir_id'], date('Y-m-d')]);
$count0 = $stmt->rowCount();
$tasks = $stmt->fetchAll();
if($count0 == 0){
    echo "<h1>You have no tasks</h1>";
}
else{
    foreach($tasks as $task){
        echo "<h2>Today's tasks:</h2>
        <div class='card' style='width: 18rem;'>
        <div class='card-body'>
          <h5 class='card-title'>Task description: ".$task['task_description']."</h5>
          <h6 class='card-subtitle mb-2 text-muted'>Location: ".$task['location']."</h6>
          <p class='card-text'>Date: ".$task['date']."</p>
          <a href='cancel_task.php?id=".$task['task_id']."' class='card-link'>Cancel</a>
          <a href='finish_task.php?id=".$task['task_id']."' class='card-link'>Finish</a>
        </div>
      </div>";
    }
}

$query = "SELECT * FROM tasks WHERE kurir_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['kurir_id']]);
$count1 = $stmt->rowCount();
$tasks = $stmt->fetchAll();
if($count1 == 0){
    echo "<h1>You have no tasks</h1>";
}
else{
    foreach($tasks as $task){
        echo "<h2>Your tasks:</h2>
        <div class='card' style='width: 18rem;'>
        <div class='card-body'>
          <h5 class='card-title'>Task description: ".$task['task_description']."</h5>
          <h6 class='card-subtitle mb-2 text-muted'>Location: ".$task['location']."</h6>
          <p class='card-text'>Date: ".$task['date']."</p>
          <p class='card-text'>Time: ".$task['time']."</p>
          <a href='finish_task.php?id=".$task['task_id']."' class='card-link'>Finish</a>
        </div>
      </div>";
    }
}


?>





<?php include 'footer.php';?>