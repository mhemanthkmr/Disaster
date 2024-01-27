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
                    <h5 class="">Edit Category</h5>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_GET['id'])) {
                            $user_id = $_GET['id'];
                            $users = "SELECT * FROM categories WHERE id='$user_id'";
                            // die($users);
                            $users_run = mysqli_query($con,$users);
                            if(mysqli_num_rows($users_run) > 0)
                            { 
                                foreach($users_run as $user)
                                // die(print_r($user));
                                { ?>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="id" value="<?=$user_id?>">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="">Name</label>
                                                <input value="<?=$user['name']?>" name = "name" type="text" max="191" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Slug(URL)</label>
                                                <input value="<?=$user['slug']?>" name = "slug" type="text" max="191" class="form-control">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="">Description</label>
                                                <textarea value="" name="description" id="" class="form-control" rows="4"><?=$user['description']?></textarea>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="">Meta Title</label>
                                                <input value="<?=$user['meta-title']?>" name = "meta-title" type="text" max="191" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Meta Description</label>
                                                <textarea value="" name="meta-description" id="" class="form-control" rows="4"><?=$user['meta-description']?></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Meta Keyword</label>
                                                <textarea value="" name="meta-keyword" id=""   class="form-control" rows="4"><?=$user['meta-keyword']?></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Navbar Status</label>
                                                <input type="checkbox" <?=($user['navbar-status'] == '1' ? 'checked' : '');?> name="navbar-status" width="70px" height="70px" id="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Status</label>
                                                <input type="checkbox" <?=($user['status'] == '1' ? 'checked' : '');?> name="status" width="70px" height="70px" id="">
                                            </div>
                                            <div class="text-center col-md-12 mb-3">
                                                <button class="text-center btn btn-primary" name="update-category" type="submit">Update Category</button>
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
include('includes/footer.php');
include('includes/scripts.php');
?>