<?php session_start();
 include_once 'header.php';

if(isset($_SESSION['type']))
{
if($_SESSION['type']==0)
{
    echo "<link rel='stylesheet' href='css/request_form.css'>

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
}
else{
    echo "<div class='container scroll'>
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
$query="SELECT * FROM tasks WHERE kurir_id=".$_SESSION['kurir_id'];
$stmt=$pdo -> query($query);
$result=$stmt->fetchAll();
$count=$stmt->rowCount();
if($count==0)
{
    echo "<div class='card'>
    <div class='card-body'>
        <h5 class='card-title'>You don't have any tasks</h5>
    </div>

    ";
}
else{
    foreach($result as $row)
    {
        
$loc=$row['Location'];
$nl= str_replace(" ","%20","$loc");

echo "<div class='mapouter'><div class='gmap_canvas'><iframe width='600' height='500' id='gmap_canvas' src='https://maps.google.com/maps?q=".$nl."&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe><a href='https://fmovies-online.net'></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href='https://www.embedgooglemap.net'>google iframe map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>";
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

echo "</div>
</div>";
}
}
else{
 header("Location: login.php");   
}?>

<?php include_once 'footer.php'?>