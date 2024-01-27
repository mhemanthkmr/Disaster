<?php 
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <!-- <ol class="breadcrumb mb-4">
        <a href="index.php" class="breadcrumb-item active">Dashboard</a>
        <a href="view-register.php"class="breadcrumb-item">Users</a>
    </ol> -->
    <div class="row">
        <div class="col-md-12 pt-4">
            <?php include('message.php'); ?>
            <div class="card ">
                <div class="card-header">
                    <h5 class="">View Resource
                        <a href="add-resource.php" class="btn btn-primary float-end">Add Resource</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    $resource = "SELECT * FROM Resource";
                                    $resource_run = mysqli_query($con, $resource);
                                    if(mysqli_num_rows($resource_run) > 0)
                                    { $i=1;
                                        foreach($resource_run as $item)
                                        { ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$item['ResourceName'];?></td>
                                                <td>
                                                    <?php 
                                                        $type = $item['ResourceType'];
                                                        if($type == 1)
                                                            echo "Medicine";
                                                        else if($type == 2)
                                                            echo "Food";
                                                        else if($type == 3)
                                                            echo "Clothes";
                                                        else if($type == 4)
                                                            echo "Shelter";
                                                        else if($type == 5)
                                                            echo "Others";
                                                        else
                                                            echo "Unknown";
                                                    ?>
                                                </td>
                                                <td><?=$item['ResourceQuantity'];?></td>
                                                <td>
                                                    <?php 
                                                        if($item['ResourceStatus'] == 1)
                                                            echo "Available";
                                                        else
                                                            echo "Not Available";
                                                    ?>
                                                </td>
                                                <td><a href="edit-resource.php?id=<?=$item['ResourceID']?>" class="btn btn-sm btn-warning" type="submit">Edit</a></td>
                                                <td>
                                                    <form action="code.php" method="post">
                                                        <input type="hidden" name="user_id" value="<?=$item['ResourceID'];?>">
                                                        <button class="btn btn-sm btn-danger" name="resource_delete" type="submit">Delete</button>
                                                    </form>
                                                </td>
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
include('includes/scripts.php');
include('includes/footer.php');
?>