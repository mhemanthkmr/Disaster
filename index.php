<?php 
include('auth.php');
include('includes/header.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <?php include('message.php')?>
                <h3 class="text-center">Incident Form</h3>
                <form action="code.php" method="POST">
                    <div class="form-group">
                        <label for="incidentType">Incident Type</label><br>
                        <select name="incidentType" class="form-control">
                            <option value="1">Earthquake</option>
                            <option value="2">Fire</option>
                            <option value="3">Flood</option>
                            <option value="4">Tsunami</option>
                            <option value="5">Typhoon</option>
                            <option value="6">Volcanic Eruption</option> 
                        </select> <br>
                    </div>
                    <div class="form-group">
                        <label for="incidentLocation">Incident Location</label><br>
                        <input type="text" id="incidentLocation" name="incidentLocation" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label for="incidentDateTime">Incident Date and Time</label><br>
                        <input type="date" id="incidentDateTime" name="incidentDateTime" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        <label for="incidentSeverity">Incident Severity</label><br>
                        <select class="form-control" name="incidentSeverity" id="">
                            <option value="1">1 - Minor</option>
                            <option value="2">2 - Moderate</option>
                            <option value="3">3 - Major</option>
                            <option value="4">4 - Catastrophic</option>
                        </select>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="incidentDescription">Incident Description</label><br>
                        <textarea id="incidentDescription" name="incidentDescription" class="form-control"></textarea><br>
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number</label><br>
                        <input type="number" id="contactNumber" name="contactNumber" class="form-control"><br>
                    </div>
                    <div class="text-center">
                        <button name="add_incident" type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>