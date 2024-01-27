<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Edit User Details</h4>
    <ol class="breadcrumb mb-4">
        <a href="index.php" class="breadcrumb-item active">Dashboard</a>
        <a href="view-register.php"class="breadcrumb-item">Users</a>
        <a href="register-edit.php"class="breadcrumb-item">Edit</a>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="">Edit Users</h5>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_GET['id'])) {
                            $user_id = $_GET['id'];
                            $users = "SELECT * FROM users WHERE id='$user_id'";
                            // die($users);
                            $users_run = mysqli_query($con,$users);
                            if(mysqli_num_rows($users_run) > 0)
                            { 
                                foreach($users_run as $user)
                                // die($user);
                                { ?>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="user-id" value="<?=$user['id'];?>">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="">Name</label>
                                                <input name = "name" type="text" value="<?=$user['name']?>"  class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Email</label>
                                                <input name="email" type="text" value="<?=$user['email']?>" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Role</label>
                                                <select class="form-control" value="" name="role_as" id="">
                                                    <option value="">--Seclect Role--</option>
                                                    <option value="1" <?=($user['role_as'] == 1 ? 'selected' : '');?>>Admin</option>
                                                    <option value="2" <?=($user['role_as'] == 2 ? 'selected' : '');?>>Manufacturer</option>
                                                    <option value="3" <?=($user['role_as'] == 3 ? 'selected' : '');?>>Retailer</option>
                                                    <option value="0" <?=($user['role_as'] == 0 ? 'selected' : '');?>>Customer</option>

                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Status</label>
                                                <input type="checkbox" <?=($user['status'] == '1' ? 'checked' : '');?> name="status" width="70px" height="70px" id="">
                                            </div>
                                            <div class="text-center col-md-12 mb-3">
                                                <button class="text-center btn btn-primary" name="update_user" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php }
                            }
                            else
                            {?>
                                <h4>No Record Found</h4><?php
                            }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>