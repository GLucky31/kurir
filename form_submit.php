<?php

include 'database.php';
    if(isset($_POST['btn'])){

        $query = "INSERT INTO tasks (task_description, location, date, time) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt -> execute([$_POST['task_description'], $_POST['location'], $_POST['date'], $_POST['time']]);
        $task = $stmt->fetchall();

        header( "refresh:5; url=request_form.php" ); 
    }
?>