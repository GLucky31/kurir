<? include 'database.php';
$id=$_GET['id'];
$query = "SELECT * FROM tasks WHERE kurir_id = ? AND task_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['kurir_id'], $id]);
$count = $stmt->rowCount();
if($count == 1){
    $query = "DELETE tasks WHERE task_id = ? AND kurir_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id,$_SESSION['kurir_id']]);
    header("Location: kurir.php");
}
else{
   header("Location: kurir.php");
}