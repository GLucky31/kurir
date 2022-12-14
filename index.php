<?php session_start();
 include_once 'header.php';
include 'database.php';
if(isset($_SESSION['type']))
{
if($_SESSION['type']==0)
{
    include "nav.php";
    
    
echo "
    <div class='container'>
        <div class='row'>
            <div class='col-md-6 offset-md-3'>
                <div class='card'>
                    <div class='card-header'>
                        <h3>Request Form</h3>
                    </div>
                    <div class='card-body'>
                        <form action='request_script.php' method='post'>
                            <div class='form-group'>
                                <label for='task_description'>Task Description</label>
                                <textarea class='form-control' name='task_description' id='task_description' rows='3' required></textarea>
                            </div>
                            <div class='form-group'>
                                <label for='location'>Location</label>
                                <input type='text' class='form-control' name='location' id='location' required>
                            </div>
                            <div class='form-group'>
                                <label for='date'>Date</label>
                                <input type='date' class='form-control' name='date' id='date' required>
                            </div>
                            <div class='form-group'>
                                <label for='time'>Time</label>
                                <input type='time' class='form-control' name='time' id='time' required>
                            </div>
                            <input name='btn' type='submit' class='btn btn-primary'>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>";
    if(isset($_GET['t']))
    {
        if($_GET['t']==1)
        {
            echo "<script>Swal.fire('Request submitted successfully')</script>";
        }
        else{
            echo "<script>Swal.fire('Request submission failed')</script>";
        }
    }
}
else{
    include "nav2.php";
    $query= "SELECT * FROM kurirs WHERE kurir_id=?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$_SESSION['kurir_id']]);
    $kurir=$stmt->fetch();
    echo"
    <div class='container scroll'>
    <div><h3>Available tasks</h3></div>";
    
    $query="SELECT * FROM tasks WHERE kurir_id IS NULL";
    $stmt=$pdo->prepare($query);

    $stmt->execute();
    $result=$stmt->fetchAll();

    
    foreach($result as $row)
    {
    echo "<div class='card'>
    <div class='card-body'>
        <h5 class='card-title'>Task description: ".$row['Task_description']."</h5>
        <p class='card-text'>Location: ".$row['Location']."</p>
        <p class='card-text'>Date: ".$row['Date']."</p>
        <p class='card-text'>Time: ".$row['Time']."</p>
        <a href='take_task.php?id=".$row['task_id']."' class='btn btn-primary'>Take task</a>
    </div>
    </div>";
        
    }
echo "</div>
<div class='container'>
<div><h3>Current task:</h3></div>
<div>";
$query="SELECT * FROM tasks WHERE kurir_id=? AND date=?";
$loc= 'https://www.google.com/maps/dir/Current+Location/';
$stmt=$pdo -> prepare($query);
$stmt->execute([$_SESSION['kurir_id'],date("Y-m-d")]);
$result=$stmt->fetchAll();
$count=$stmt->rowCount();
if($count==0)
{
    echo "<div class='card'>
    <div class='card-body'>
        <h5 class='card-title'>You don't have any tasks today</h5>
    </div>";
}
else{
    
    foreach($result as $row)
    {

$nl= str_replace(" ","+",$row['Location']);
$loc=$loc.$nl."/";
   echo "<div class='card'>
        <div class='card-body'>
            <h5 class='card-title'>Task description: ".$row['Task_description']."</h5>
            <p class='card-text'>Location: ".$row['Location']."</p>
            <p class='card-text'>Date: ".$row['Date']."</p>
            <p class='card-text'>Time: ".$row['Time']."</p>
            <a href='finish_task.php?id=".$row['task_id']."' class='btn btn-primary'>Finish task</a>
        </div>
            ";
    }
}
echo "<div class='mapouter'><div class='gmap_canvas'><a href=".$loc.">Map</a></iframe></div></div>";
echo "</div>
</div>";
}
}
else{
 header("Location: login.php");   
}?>

<?php include_once 'footer.php'?>