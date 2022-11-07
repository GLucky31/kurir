<?php include 'header.php';
session_start();
include 'nav2.php';
?>

<?php
  include 'database.php';
  echo "<div class='container'><div class='row'><div class='col-md-12'><h2>Your tasks:</h2>";
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
        echo "
        <div class='card' style='width: 18rem;'>
        <div class='card-body'>
          <h5 class='card-title'>Task description: ".$task['Task_description']."</h5>
          <h6 class='card-subtitle mb-2 text-muted'>Location: ".$task['Location']."</h6>
          <p class='card-text'>Date: ".$task['Date']."</p>
          <p class='card-text'>Time: ".$task['Time']."</p>
          <a href='finish_task.php?id=".$task['task_id']."' class='card-link'>Finish</a>
          <a href='unpick_task.php?id=".$task['task_id']."' class='card-link'>Unpick</a>
        </div>
      </div>";
    }
}
echo "</div></div></div>";

?>





<?php include 'footer.php';?>