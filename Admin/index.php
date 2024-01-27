<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Admin for Pharmacy</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <!-- //Total Users -->
                <div class="card-header">Total Users</div>
                <?php 
                    $user = "SELECT * FROM users WHERE status = 1";
                    $user_run = mysqli_query($con, $user);
                    $user_count = mysqli_num_rows($user_run);
                ?>
                <div class="card-body"><h1 class="text-center"><?=$user_count?></h1></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <!-- No of Manufacturers -->
                <div class="card-header">Total Incident</div>
                <?php 
                    $incident = "SELECT * FROM Incident";
                    $incident_run = mysqli_query($con, $incident);
                    $incident_count = mysqli_num_rows($incident_run);
                ?>
                <div class="card-body"><h1 class="text-center"><?=$incident_count?></h1></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <!-- No of Medicines -->
                <div class="card-header">Total Resource</div>
                <?php 
                    $recource = "SELECT * FROM Resource";
                    $recource_run = mysqli_query($con, $recource);
                    $recource_count = mysqli_num_rows($recource_run);
                ?>
                <div class="card-body"><h1 class="text-center"><?=$recource_count?></h1></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <!-- No of Retailers -->
                <div class="card-header">Total Dispatch</div>
                <?php 
                    $Dispatch = "SELECT * FROM DispatchLog";
                    $Dispatch_run = mysqli_query($con, $Dispatch);
                    $Dispatch_count = mysqli_num_rows($Dispatch_run);
                ?>
                <div class="card-body"><h1 class="text-center"><?=$Dispatch_count?></h1></div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');

?>