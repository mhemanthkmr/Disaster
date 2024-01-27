<?php 
session_start();

if(isset($_POST['logout_btn'])) {
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    unset($_SESSION['auth_role']);

    $_SESSION['flag'] = 1;
    $_SESSION['message'] = "Logged Out Successfully";
    header("Location: login.php");
    exit(0);
}
?>