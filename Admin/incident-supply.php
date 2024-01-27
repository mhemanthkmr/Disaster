<?php
    include('authentication.php');
    include('includes/header.php');
?>
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12 pt-4">
            <?php include('message.php');?>
            <div class="card">
                <div class="card-header">
                    <h5 class="">Supply Resource to Incident</h5>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_GET['id'])) {
                            $incident_id = $_GET['id'];
                            $incident = "SELECT * FROM Incident WHERE IncidentID='$incident_id'";
                            $incident_run = mysqli_query($con,$incident);
                            if(mysqli_num_rows($incident_run) > 0)
                            { 
                                foreach($incident_run as $incident)
                                { ?>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="id" value="<?=$incident_id?>">
                                        <div class="row">
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="">Incident Type</label>
                                                <input value="<?php 
                                                    if($incident['IncidentType'] == 1)
                                                    {
                                                        echo "Earthquake";
                                                    }
                                                    elseif($incident['IncidentType'] == 2)
                                                    {
                                                        echo "Fire";
                                                    }
                                                    elseif($incident['IncidentType'] == 3)
                                                    {
                                                        echo "Flood";
                                                    }
                                                    elseif($incident['IncidentType'] == 4)
                                                    {
                                                        echo "Tsunami";
                                                    }
                                                    elseif($incident['IncidentType'] == 5)
                                                    {
                                                        echo "Typhoon";
                                                    }
                                                    elseif($incident['IncidentType'] == 6)
                                                    {
                                                        echo "Others";
                                                    }
                                                    else
                                                    {
                                                        echo "Unknown";
                                                    }
                                                ?>" name = "type" type="text" max="191" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="">Incident Location</label>
                                                <input value="<?=$incident['IncidentLocation']?>" name = "location" type="text" max="191" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="">Incident Date and Time</label>
                                                <input value="<?=$incident['IncidentDateTime']?>" name = "date-time" type="text" max="191" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="">Incident Severity</label>
                                                <input value="<?php 
                                                    if($incident['IncidentSeverity'] == 1)
                                                    {
                                                        echo "Low";
                                                    }
                                                    elseif($incident['IncidentSeverity'] == 2)
                                                    {
                                                        echo "Medium";
                                                    }
                                                    elseif($incident['IncidentSeverity'] == 3)
                                                    {
                                                        echo "High";
                                                    }
                                                    else
                                                    {
                                                        echo "Unknown";
                                                    }
                                                ?>" name = "severity" type="text" max="191" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="">Incident Description</label>
                                                <textarea value="" name="description" id="" class="form-control" rows="4" readonly><?=$incident['IncidentDescription']?></textarea>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="">Contact Number</label>
                                                <input value="<?=$incident['ContactNumber']?>" name = "contact-number" type="text" max="191" class="form-control" readonly>
                                            </div>
                                            <br>
                                            <div class="card-header">
                                                <h5 class="">Supply Resource</h5>
                                            </div>
                                            <div class="col-md-6 my-3">
                                                <label for="">Supply</label>
                                                <select class="form-control" name="supply">
                                                    <?php 
                                                        $supply = "SELECT * FROM Resource";
                                                        $supply_run = mysqli_query($con, $supply);
                                                        if(mysqli_num_rows($supply_run) > 0)
                                                        { 
                                                            foreach($supply_run as $item)
                                                            { ?>
                                                                <option value="<?=$item['ResourceID']?>"><?=$item['ResourceName']?></option>
                                                            <?php }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 my-3">
                                                <label for="">Supply Quantity</label>
                                                <input value="" name = "supply-quantity" type="text" max="191" class="form-control">
                                            </div>
                                            <!-- Address -->
                                            <div class="col-md-12 my-3">
                                                <label for="">Address</label>
                                                <textarea value="" name="address" id="" class="form-control" rows="4"></textarea>
                                            </div>
                                            <!-- Dispatch Date Time -->
                                            <div class="col-md-6 my-3">
                                                <label for="">Dispatch Date Time</label>
                                                <input value="" name = "dispatch-date-time" type="datetime-local" max="191" class="form-control">
                                            </div>
                                            <!-- Dispatched By -->
                                            <div class="col-md-6 my-3">
                                                <label for="">Dispatched By</label>
                                                <!-- Users -->
                                                <select name="user-id" class="form-control">
                                                    <?php 
                                                        $users = "SELECT * FROM users";
                                                        $users_run = mysqli_query($con, $users);
                                                        if(mysqli_num_rows($users_run) > 0)
                                                        { 
                                                            foreach($users_run as $item)
                                                            { ?>
                                                                <option value="<?=$item['id']?>"><?=$item['name']?></option>
                                                            <?php }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="text-center col-md-12 mb-3">
                                                <button class="text-center btn btn-primary" name="incident-supply" type="submit">Supply Resource</button>
                                            </div>
                                        </div>
                                    </form>  <?php    
                                }
                            }
                        } ?>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include('includes/scripts.php');
    include('includes/footer.php');
?>