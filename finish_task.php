<?php session_start();
 include 'database.php';
$id=$_GET['id'];
$query = "SELECT * FROM tasks WHERE kurir_id = ? AND task_id = ?";
$stmt = $pdo -> prepare($query);
$stmt->execute([$_SESSION['kurir_id'], $id]);
$user=$stmt->fetch();
$count = $stmt->rowCount();

if($count == 1){
    $query="SELECT * FROM users WHERE user_id = ?";
    $stmt = $pdo -> prepare($query);
    $stmt->execute([$user['user_id']]);
    $users=$stmt->fetch();
    $query = "INSERT INTO notifications ( user_id, content) VALUES (?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$users['user_id'], 'Task at '.$user['Location'].' with description '. $user['Task_description'].' has been finished']);
    $query = "DELETE FROM tasks WHERE task_id = ? AND kurir_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id,$_SESSION['kurir_id']]);
    $query="SELECT points FROM kurirs WHERE kurir_id=?";
    $stmt=$pdo-> prepare($query);
    $stmt->execute([$_SESSION['kurir_id']]);
    $tocke=$stmt->fetch();
    $points=$tocke['points'];
    $points=$points+1;
    $query="UPDATE kurirs SET points=? WHERE kurir_id=?";
    $stmt=$pdo-> prepare($query);
    $stmt->execute([$points, $_SESSION['kurir_id']]);
    header("Location: index.php");
}
else{
   header("Location: index.php");
}?>