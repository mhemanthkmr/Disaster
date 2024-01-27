<?php

session_start();
include('Admin/config/dbcon.php');

if(isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']) ;
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $hash = md5($password);
    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$hash'";
    $login_query_run = mysqli_query($con, $login_query);
    if(mysqli_num_rows($login_query_run) > 0) {
        foreach($login_query_run as $data) {
            $user_id = $data['id'];
            $username = $data['name'];
            $user_email = $data['email'];
            $user_roll = $data['role_as'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$user_roll"; //1 is admin 0 is common user
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $username,
            'user_email' => $user_email,
        ];

        if($_SESSION['auth_role'] == '1') {
            $_SESSION['flag'] = 1;
            $_SESSION['message'] = "Welcome to Dashboard";
            header("Location: Admin/index.php");
        }
        elseif($_SESSION['auth_role'] == '0') {
            $_SESSION['flag'] = 1;
            $_SESSION['message'] = "You are Logged in";
            header("Location: index.php");
        }

    } else {
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "Invalid Email are Password";
        header("Location: login.php");
        exit(0);
    }
} else {
    $_SESSION['flag'] = 2;
    $_SESSION['message'] = "You are not allowed";
    header("Location: login.php");
    exit(0);
}
