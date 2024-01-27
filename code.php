<?php 
include('Admin/config/dbcon.php');
session_start();
if(isset($_POST['add_incident']))
{ ?>
    <?php
    $incidentType = $_POST['incidentType'];
    $incidentLocation = $_POST['incidentLocation'];
    $incidentDateTime = $_POST['incidentDateTime'];
    $incidentSeverity = $_POST['incidentSeverity'];
    $incidentDescription = $_POST['incidentDescription'];
    $contactNumber = $_POST['contactNumber'];
    $query = "INSERT INTO Incident (incidentType, incidentLocation, incidentDateTime, incidentSeverity, incidentDescription, contactNumber) VALUES ('$incidentType', '$incidentLocation', '$incidentDateTime', '$incidentSeverity', '$incidentDescription', '$contactNumber')";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Incident Added";
        $_SESSION['flag'] = 1; 
        header('Location: index.php');
    }
    else
    {
        $_SESSION['message'] = "Incident Not Added";
        $_SESSION['flag'] = 0;
        header('Location: index.php');
    }
}
?>