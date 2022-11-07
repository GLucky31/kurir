<?php include "database.php";
session_start();

if(isset($_GET['id'])){
    $query = "SELECT * FROM tasks WHERE task_id = ?";
    $stmt = $pdo -> prepare($query);
    $stmt->execute([$_GET['id']]);
    $notification=$stmt->fetch();
    if(isset($_SESSION['kurir_id'])&&($_SESSION['kurir_id']==$notification['kurir_id']))    {
      $query="UPDATE tasks SET kurir_id=NULL WHERE task_id=?";
        $stmt=$pdo->prepare($query);
        $stmt->execute([$_GET['id']]);
        header("Location: task_list.php");
      
    }
    else{
        header("Location: index.php");
    }
}
else{
    header("location: index.php");
}