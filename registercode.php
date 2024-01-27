<?php
session_start();
include('Admin/config/dbcon.php');

if(isset($_POST['register_btn'])){
    $name = mysqli_real_escape_string($con,$_POST['name']) ;
    $email = mysqli_real_escape_string($con,$_POST['email']) ;
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

    if ($password == $cpassword) 
    {
        $checkmail = "SELECT email FROM users WHERE email='$email'";
        $checkmail_run = mysqli_query($con,$checkmail);
        if(mysqli_num_rows($checkmail_run)>0)
        {
            $_SESSION['flag'] = 2;
            $_SESSION['message'] = "Already email exist";
            header("Location: register.php");
            exit(0);
        }
        else 
        {
            $password = md5($cpassword);
            $user_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
            // die($user_query);
            $user_query_run = mysqli_query($con,$user_query);
            // die($user_query);
            if($user_query_run)
            {
                $_SESSION['message'] = "Registered Successfully";
                $_SESSION['flag'] = 1;
                header("Location: login.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Something is Wrong"."$user_query_run";
                $_SESSION['flag'] = 2;
                header("Location: register.php");
                exit(0);
            }
        }
    }
    else 
    {
        $_SESSION['message'] = "Password and Confirm Password does not match";
        $_SESSION['flag'] = 2;
        header("Location: register.php");
        exit(0);
    }
}
else{
    header("Location: register.php");
    exit(0);
}
?>
