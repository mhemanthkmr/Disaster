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
                    <h5 class="">Edit Post</h5>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_GET['id'])) {
                            $post_id = $_GET['id'];
                            $users = "SELECT * FROM posts WHERE id='$post_id'";
                            // die($users);
                            $users_run = mysqli_query($con,$users);
                            if(mysqli_num_rows($users_run) > 0)
                            { 
                                foreach($users_run as $user)
                                // die(print_r($user));
                                { ?>
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?=$post_id?>">
                                        <input type="hidden" name="old" value="<?=$user['image'];?>">
                                        <div class="col-md-12 mb-3">
                                            <label for="">Catogory List</label>
                                            <?php 
                                                $category = "SELECT * FROM categories WHERE status = '1'";
                                                $category_run = mysqli_query($con, $category);
                                                // die($category);
                                                if(mysqli_num_rows($category_run))
                                                { ?>
                                                    <select class="form-control" name="cato_id" id="">  
                                                    <option value="">Select One</option>
                                                    <?php
                                                        foreach($category_run as $item)
                                                        {  
                                                    ?>
                                                        <option value="<?=$item['id']?>" <?=$item['id'] == $user['category_id'] ? 'selected' : '' ?>><?=$item['name']?></option>
                                                    <?php    } ?>
                                                    </select>        
                                                <?php
                                                }
                                                else 
                                                { ?>
                                                    <h5>No Category Available</h5>
                                                <?php }
                                            ?>
                                        </div>
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
                                                <input value="<?=$user['meta_title']?>" name = "meta-title" type="text" max="191" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Meta Description</label>
                                                <textarea value="" name="meta_description" id="" class="form-control" rows="4"><?=$user['meta_description']?></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Meta Keyword</label>
                                                <textarea value="" name="meta-keyword" id=""   class="form-control" rows="4"><?=$user['meta_keyword']?></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Image</label>
                                                <input name = "image" type="file" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Status</label>
                                                <input type="checkbox" <?=($user['status'] == '1' ? 'checked' : '');?> name="status" width="70px" height="70px" id="">
                                            </div>
                                            <div class="text-center col-md-12 mb-3">
                                                <button class="text-center btn btn-primary" name="update-post" type="submit">Update Post</button>
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