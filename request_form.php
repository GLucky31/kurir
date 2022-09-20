<?php include_once 'header.php'?>
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
                            <textarea class="form-control" name="task_description" id="task_description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" id="location">
                        </div>
                        <div class="form-group-map">
                            <label for="map">Map</label>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2753.396289247957!2d15.110714016027528!3d46.36152497912179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476566d59f1a4b5d%3A0xbcf2502acae45822!2sTrg%20mladosti%203%2C%203320%20Velenje!5e0!3m2!1ssl!2ssi!4v1663680413435!5m2!1ssl!2ssi" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" name="time" id="time">
                        </div>
                        <button name="btn" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'?>

