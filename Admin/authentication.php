<?php 
session_start();
include('config/dbcon.php');

if(!isset($_SESSION['auth']))
{
    $_SESSION['flag'] = 2;
    $_SESSION['message'] = "Login to Access the Dashboard";
    header("Location: ../login.php");
    exit(0);
}
else 
{
    if ($_SESSION['auth_role'] != "1") {
        // die($_SESSION['auth_role']."Helo");
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "You are not Authorized as ADMIN";
        header("Location: ../login.php");
        exit(0);
    }
    else if ($_SESSION['auth_role'] == "2") {
        // die($_SESSION['auth_role']."Helo");
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "You are not Authorized as ADMIN";
        header("Location: ../Retailer/index.php");
        exit(0);
    }
    else if ($_SESSION['auth_role'] == "3") {
        // die($_SESSION['auth_role']."Helo");
        $_SESSION['flag'] = 2;
        $_SESSION['message'] = "You are not Authorized as ADMIN";
        header("Location: ../Manufacturer/index.php");
        exit(0);
    }
}

?>