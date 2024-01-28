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
                    <h5 class="">View Dispatched Resources
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Resource Name</th>
                                <th>Resource Type</th>
                                <th>Quantity</th>
                                <th>Dispatched To</th>
                                <th>Dispatched By</th>
                                <th>Dispatched Date</th>
                                <th>Dispatched Time</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    $dispatch = "SELECT * FROM DispatchLog";
                                    $dispatch_run = mysqli_query($con, $dispatch);
                                    if(mysqli_num_rows($dispatch_run) > 0)
                                    { $i=1;
                                        foreach($dispatch_run as $item)
                                        { ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$item['resourceName'];?></td>
                                                <td><?=$item['resourceType'];?></td>
                                                <td><?=$item['quantity'];?></td>
                                                <td><?=$item['dispatchedTo'];?></td>
                                                <td><?=$item['dispatchedBy'];?></td>
                                                <td><?=$item['dispatchedDate'];?></td>
                                                <td><?=$item['dispatchedTime'];?></td>
                                            </tr> 
                                            <?php
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
include('includes/scripts.php'); 
include('includes/footer.php');
?>