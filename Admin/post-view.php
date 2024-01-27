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
                    <h5 class="">View Post
                        <a href="post-add.php" class="btn btn-primary float-end">Add Post</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                        // $category = "SELECT * FROM posts WHERE status != 2";
                                        $category = "SELECT p.*,c.name AS cname  FROM posts p,categories c WHERE c.id = p.category_id";
                                        $category_run = mysqli_query($con, $category);
                                        if(mysqli_num_rows($category_run) > 0)
                                        { $i=1;
                                            foreach($category_run as $item)
                                            { ?>
                                                <tr>
                                                    <td><?=$i++?></td>
                                                    <td><?=$item['name'];?></td>
                                                    <td><?=$item['cname'];?></td>
                                                    <td><img src="../uploads/posts/<?=$item['image']?>" width="90px" height="60px" alt="NO IMAGE"></td>
                                                    <td><?=$item['status'] == 1 ? 'Visible' : 'Hidden';?></td>
                                                    <td><a href="post-edit.php?id=<?=$item['id']?>" class="btn btn-sm btn-warning" type="submit">Edit</a></td>
                                                    <td>
                                                        <form action="code.php" method="post">
                                                            <input type="hidden" name="user_id" value="<?=$item['id'];?>">
                                                            <input type="hidden" name="img" value="<?=$item['image'];?>">
                                                            <button class="btn btn-sm btn-danger" name="post_delete" type="submit">Delete</button>
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
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>