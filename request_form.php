<?php include_once 'header.php'?>
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
                            <textarea class="form-control" name="task_description" id="task_description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" id="location">
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" name="time" id="time">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'?>

