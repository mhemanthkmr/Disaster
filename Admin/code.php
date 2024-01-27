<?php 
include('authentication.php');
//Supply Resource to Incident and add into the dispatch log
// if(isset($_POST['supply-resource']))
// {
//     die(print_r($_POST));
//     $incidentID = $_POST['id'];
//     $resourceID = $_POST['supply'];
//     $resourceQuantity = $_POST['supply-quantity'];
//     $supplyAddress = $_POST['address'];
//     $dispatchedDateTime = $_POST['dispatch-date-time'];
//     $dispatchedBy = $_POST['user-id'];
//     $status = 1;
//     $query = "SELECT ResourceQuantity FROM Resource WHERE ResourceID = '$resourceID'";
//     die($query);
//     $query_run = mysqli_query($con, $query);
//     $row = mysqli_fetch_array($query_run);
//     if($row['ResourceQuantity'] < $resourceQuantity)
//     {
//         $_SESSION['message'] = "Resource Not Supplied";
//         $_SESSION['flag'] = 2;
//         header('Location: incident-supply.php');
//         die();
//     }
//     $query = "INSERT INTO DispatchLog (IncidentID, ResourceID, ResourceQuantity, Address, DispatchDateTime, dispatchedBy, status) VALUES ('$incidentID', '$resourceID', '$resourceQuantity', '$supplyAddress', '$dispatchedDateTime', '$dispatchedBy', '$status')";
//     $query_run = mysqli_query($con, $query);
//     if($query_run)
//     {
//         $_SESSION['message'] = "Resource Supplied";
//         $_SESSION['flag'] = 1; 
//         header('Location: index.php');
//     }
//     else
//     {
//         $_SESSION['message'] = "Resource Not Supplied";
//         $_SESSION['flag'] = 0;
//         header('Location: index.php');
//     }
// }

if(isset($_POST['supply-resource']))
{
    // die(print_r($_POST));
    $incidentID = $_POST['id'];
    $resourceID = $_POST['supply'];
    $resourceQuantity = $_POST['supply-quantity'];
    $supplyAddress = $_POST['address'];
    $dispatchedDateTime = $_POST['dispatch-date-time'];
    $dispatchedBy = $_POST['user-id'];
    $status = 1;
    $query = "SELECT ResourceQuantity FROM Resource WHERE ResourceID = $resourceID";
    // die($query);
    $query_run = mysqli_query($con, $query);
    $row = mysqli_fetch_array($query_run);
    if($row['ResourceQuantity'] < $resourceQuantity)
    {
        $_SESSION['message'] = "Resource Not Supplied";
        $_SESSION['flag'] = 2;
        header('Location: incident-supply.php');
        die();
    }
    $query = "INSERT INTO DispatchLog (IncidentID, ResourceID, ResourceQuantity, Address, DispatchDateTime, dispatchedBy, status) VALUES ('$incidentID', '$resourceID', '$resourceQuantity', '$supplyAddress', '$dispatchedDateTime', '$dispatchedBy', '$status')";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $query = "UPDATE Resource SET ResourceQuantity = ResourceQuantity - '$resourceQuantity' WHERE ResourceID = '$resourceID'";
        $query_run = mysqli_query($con, $query);
        $_SESSION['message'] = "Resource Supplied";
        $_SESSION['flag'] = 1; 
        header('Location: index.php');
    }
    else
    {
        $_SESSION['message'] = "Resource Not Supplied";
        $_SESSION['flag'] = 0;
        header('Location: index.php');
    }
}

//Resource Edit
if(isset($_POST['edit-resource']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'] == true ? '1' : '0';
    $query = "UPDATE `Resource` SET `ResourceName` = '$name', `ResourceType` = '$type', `ResourceQuantity` = '$quantity', `ResourceStatus` = '$status' WHERE (`ResourceId` = '$id');";
    // die($query);
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Resource Updated Successfully";
        header("Location: view-resource.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: view-resource.php");
        exit(0);
    }
}


//Resource Delete
if(isset($_POST['resource_delete']))
{
    $user_id = $_POST['user_id'];
    $user_delete = "DELETE FROM Resource WHERE ResourceId='$user_id'";
    // die($user_delete);
    $query_run = mysqli_query($con,$user_delete);
    if($query_run)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Resource Deleted Successfully";
        header("Location: view-resource.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: view-resource.php");
        exit(0);
    }
}

if(isset($_POST['add-resource']))
{
    // die(print_r($_POST));
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'] == true ? '1' : '0';
    $query = "INSERT INTO `Resource` (`ResourceName`, `ResourceType`, `ResourceQuantity`, `ResourceStatus`) VALUES ('$name','$type','$quantity','$status')";
    $query_run = mysqli_query($con,$query);
    // die($query_run.'HELlo');
    if($query_run)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Resource Added Successfully";
        header("Location: view-resource.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: resource-add.php");
        exit(0);
    }
}

if(isset($_POST['update-post']))
{
    // die(print_r($_POST));
    $id = $_POST['id'];
    // die($id);
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta-title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta-keyword'];
    $status = $_POST['status'] == true ? '1' : '0';
    $old_image = $_POST['old'];
    $image = $_FILES['image']['name'];
    if($image != NULL)
    {
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().".".$image_extension;
        $updated_filename = $filename;
    }
    else 
    {
        $updated_filename = $old_image;
    }
    // $query = "INSERT INTO categories(name,slug,description,meta-title,meta-description,meta-keyword,navbar-status,status) VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";
    $query1 = "INSERT INTO `categories` (`name`, `slug`, `description`, `meta-title`, `meta-description`, `meta-keyword`, `navbar-status`, `status`) VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";
    $query = "UPDATE `posts` SET `name` = '$name', `slug` = '$slug', `description` = '$description', `meta_title` = '$meta_title', `meta_description` = '$meta_description', `meta_keyword` = '$meta_keyword',`status` = '$status',`image` = '$updated_filename' WHERE (`id` = '$id');";
    // die($query);
    // die($query);
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        if ($image != NULL)
        {
            if (file_exists('../uploads/posts/'.$old_image)) {
                unlink('../uploads/posts/'.$old_image);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$filename);
        }
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Post Updated Successfully";
        header("Location: post-view.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: post-view.php");
        exit(0);
    }
}


if(isset($_POST['post_delete']))
{
    $user_id = $_POST['user_id'];
    $user_delete = "DELETE FROM posts WHERE id='$user_id'";
    // die($user_delete);
    $image = $_POST['img'];
    $query_run = mysqli_query($con,$user_delete);
    if($query_run)
    {
        if ($image != NULL)
        {
            if (file_exists('../uploads/posts/'.$image)) {
                unlink('../uploads/posts/'.$image);
            }
        }
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Post Deleted Successfully";
        header("Location: post-view.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: category-delete-view.php");
        exit(0);
    }
    
}

if(isset($_POST['post_add']))
{
    $id = $_POST['cato_id'];
    // die($id);
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta-title'];
    $meta_description = $_POST['meta-description'];
    $meta_keyword = $_POST['meta-keyword'];
    $image = $_FILES['image']['name'];
    // Renaming Image 

    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().".".$image_extension;
    $status = $_POST['status'] == true ? '1' : '0';
    $query = "INSERT INTO `posts`(`category_id`, `slug`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `name`) VALUES ('$id','$slug','$description','$filename','$meta_title','$meta_description','$meta_keyword','$status','$name')";
    $query_run = mysqli_query($con,$query);
    // die(print_r($_FILES));
    if($query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$filename);
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Post Added Successfully";
        header("Location: post-add.php");
        exit(0);
    }
    else
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: post-add.php");
        exit(0);
    }
}

if(isset($_POST['category_delete_permanent']))
{
    $user_id = $_POST['id'];
    $user_delete = "DELETE FROM categories WHERE id='$user_id'";
    // die($user_delete);
    $query_run = mysqli_query($con,$user_delete);
    if($query_run)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Category Deleted Successfully";
        header("Location: category-delete-view.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: category-delete-view.php");
        exit(0);
    }
    
}
if(isset($_POST['category_revoke']))
{
    $user_id = $_POST['id'];
    $user_delete = "UPDATE `categories` SET `status` = '0' WHERE (`id` = '$user_id');";
    $query_run = mysqli_query($con,$user_delete);
    if($query_run)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Category Revoked Successfully";
        header("Location: category-view.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: category-view.php");
        exit(0);
    }
}

if(isset($_POST['category_delete']))
{
    $user_id = $_POST['user_id'];
    $user_delete = "UPDATE `categories` SET `status` = '2' WHERE (`id` = '$user_id');";
    $query_run = mysqli_query($con,$user_delete);
    if($query_run)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Category Deleted Successfully";
        header("Location: category-view.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: category-view.php");
        exit(0);
    }
    
}
if(isset($_POST['update-category']))
{
    // die(print_r($_POST));
    $id = $_POST['id'];
    // die($id);
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta-title'];
    $meta_description = $_POST['meta-description'];
    $meta_keyword = $_POST['meta-keyword'];
    $navbar_status = $_POST['navbar-status'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';


    // $query = "INSERT INTO categories(name,slug,description,meta-title,meta-description,meta-keyword,navbar-status,status) VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";
    $query1 = "INSERT INTO `categories` (`name`, `slug`, `description`, `meta-title`, `meta-description`, `meta-keyword`, `navbar-status`, `status`) VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";
    $query = "UPDATE `categories` SET `name` = '$name', `slug` = '$slug', `description` = '$description', `meta-title` = '$meta_title', `meta-description` = '$meta_description', `meta-keyword` = '$meta_keyword', `navbar-status` = '$navbar_status', `status` = '$status' WHERE (`id` = '$id');";
    // die($query);
    // die($query);
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Catogory Updated Successfully";
        header("Location: category-view.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: category-add.php");
        exit(0);
    }
}


if(isset($_POST['add-category']))
{
    // die(print_r($_POST));
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta-title'];
    $meta_description = $_POST['meta-description'];
    $meta_keyword = $_POST['meta-keyword'];
    $navbar_status = $_POST['navbar-status'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';


    // $query = "INSERT INTO categories(name,slug,description,meta-title,meta-description,meta-keyword,navbar-status,status) VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";
    $query1 = "INSERT INTO `categories` (`name`, `slug`, `description`, `meta-title`, `meta-description`, `meta-keyword`, `navbar-status`, `status`) VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";
    $query_run = mysqli_query($con,$query1);
    // die($query_run.'HELlo');
    if($query_run)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Catogory Added Successfully";
        header("Location: category-view.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: category-add.php");
        exit(0);
    }
}

if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];
    $user_delete = "DELETE FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($con,$user_delete);
    if($query_run)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "User/Admin Deleted Successfully";
        header("Location: view-register.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: view-register.php");
        exit(0);
    }
    
}

if(isset($_POST['update_user']))
{
    // die("Hello");
    $user_id = $_POST['user-id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';


    $query = "UPDATE users SET name='$name' , email='$email' ,role_as = '$role_as',status = '$status' WHERE id = '$user_id'";
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['flag'] = 1;
        $_SESSION['message'] = "Updated Successfully";
        header("Location: view-register.php");
        exit(0);
    }
    else 
    {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Something Wrong";
        header("Location: view-register.php");
        exit(0);
    }
    
}
else 
{
    die();

}

?>