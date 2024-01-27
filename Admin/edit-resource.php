<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <!-- <h4 class="mt-4">Add Category</h4> -->
    <!-- <ol class="breadcrumb mb-4">
        <a href="index.php" class="breadcrumb-item active">Dashboard</a>
        <a href="view-register.php"class="breadcrumb-item">Users</a>
        <a href="register-edit.php"class="breadcrumb-item">Edit</a>
    </ol> -->
    <div class="row">
        <div class="col-md-12 pt-4">
            <?php include('message.php');?>
            <div class="card">
                <div class="card-header">
                    <h5 class="">Edit Resource</h5>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_GET['id'])) {
                            $resource_id = $_GET['id'];
                            $resources = "SELECT * FROM Resource WHERE ResourceID='$resource_id'";
                            $resources_run = mysqli_query($con,$resources);
                            if(mysqli_num_rows($resources_run) > 0)
                            { 
                                foreach($resources_run as $resource)
                                { ?>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="id" value="<?=$resource_id?>">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="">Resource Name</label>
                                                <input value="<?=$resource['ResourceName']?>" name = "name" type="text" max="191" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Resource Type</label>
                                                <select class="form-control" name="type">
                                                    <option value="1">Medicine</option>
                                                    <option value="2">Food</option>
                                                    <option value="3">Clothes</option>
                                                    <option value="4">Shelter</option>
                                                    <option value="5">Others</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Resource Quantity</label>
                                                <input value="<?=$resource['ResourceQuantity']?>" name = "quantity" type="text" max="191" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Resource Status</label>
                                                <input type="checkbox" name="status" width="70px" height="70px" id="">
                                            </div>
                                            <div class="text-center col-md-12 mb-3">
                                                <button class="text-center btn btn-primary" name="edit-resource" type="submit">Save Resource</button>
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
include('includes/footer.php');
include('includes/scripts.php');
?>