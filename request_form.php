<?php include_once 'header.php'?>
<?php include 'form_submit.php'?>
<link rel="stylesheet" href="css/request_form.css">
<!-- create a responsive center screen bootstrap form with text area input field titled "Task description", input called location with a button that opens a map and lets user choose location that fills out the location field, date, time, and a submit button -->
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>Request Form</h3>
                </div>
                <div class="card-body">
                    <form action="request_form.php" method="post">
                        <div class="form-group">
                            <label for="task_description">Task Description</label>
                            <textarea class="form-control" name="task_description" id="task_description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" id="location" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" name="time" id="time" required>
                        </div>
                        <button name="btn" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'?>

