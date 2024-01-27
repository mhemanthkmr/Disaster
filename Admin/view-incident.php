<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12 pt-4">
            <?php include('message.php'); ?>
            <div class="card ">
                <div class="card-header">
                    <h5 class="">View Incident</h5>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Incident Type</th>
                                <th>Incident Location</th>
                                <th>Incident Date and Time</th>
                                <th>Incident Severity</th>
                                <th>Incident Description</th>
                                <th>Contact Number</th>
                                <th>Supply</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    $incident = "SELECT * FROM Incident";
                                    $incident_run = mysqli_query($con, $incident);
                                    if(mysqli_num_rows($incident_run) > 0)
                                    { $i=1;
                                        foreach($incident_run as $item)
                                        { ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?php 
                                                    if($item['IncidentType'] == 1)
                                                    {
                                                        echo "Earthquake";
                                                    }
                                                    elseif($item['IncidentType'] == 2)
                                                    {
                                                        echo "Fire";
                                                    }
                                                    elseif($item['IncidentType'] == 3)
                                                    {
                                                        echo "Flood";
                                                    }
                                                    elseif($item['IncidentType'] == 4)
                                                    {
                                                        echo "Tsunami";
                                                    }
                                                    elseif($item['IncidentType'] == 5)
                                                    {
                                                        echo "Typhoon";
                                                    }
                                                    elseif($item['IncidentType'] == 6)
                                                    {
                                                        echo "Volcanic Eruption";
                                                    }
                                                    else
                                                    {
                                                        echo "Unknown";
                                                    }
                                                ?></td>
                                                <td><?=$item['IncidentLocation'];?></td>
                                                <td><?=$item['IncidentDateTime'];?></td>
                                                <td><?php 
                                                    if($item['IncidentSeverity'] == 1)
                                                    {
                                                        echo "Minor";
                                                    }
                                                    elseif($item['IncidentSeverity'] == 2)
                                                    {
                                                        echo "Moderate";
                                                    }
                                                    elseif($item['IncidentSeverity'] == 3)
                                                    {
                                                        echo "Major";
                                                    }
                                                    elseif($item['IncidentSeverity'] == 4)
                                                    {
                                                        echo "Catastrophic";
                                                    }
                                                    else
                                                    {
                                                        echo "Unknown";
                                                    }
                                                ?></td>
                                                <td><?=$item['IncidentDescription'];?></td>
                                                <td><?=$item['ContactNumber'];?></td>
                                                <td><a href="incident-supply.php?id=<?=$item['IncidentID']?>" class="btn btn-sm btn-warning" type="submit">Supply</a></td>
                                            </tr> <?php
                                        }
                                    } 
                                    else 
                                    { ?>
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                <?php }?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>