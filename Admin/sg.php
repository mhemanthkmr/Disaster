<?php 
die($GLOBALS);
if(isset($_POST['supply-incident']))
{
    $incident = $_POST['supply-incident'];
    $supply = $_POST['supply'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $query = "INSERT INTO supply_incident (incident, supply, quantity, date, time, location, description) VALUES ('$incident', '$supply', '$quantity', '$date', '$time', '$location', '$description')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Supply Incident Added";
        header('Location: sg.php');
    }
    else
    {
        $_SESSION['status'] = "Supply Incident Not Added";
        header('Location: sg.php');
    }
}

?>