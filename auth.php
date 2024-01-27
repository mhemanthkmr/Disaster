<?php 
session_start();
include('./Admin/config/dbcon.php');

if(!isset($_SESSION['auth']))
{
    $_SESSION['flag'] = 2;
    $_SESSION['message'] = "Login to Access the Home";
    header("Location: login.php");
    exit(0);
}
// else 
// {
//     if ($_SESSION['auth_role'] != "1") {
//         // die($_SESSION['auth_role']."Helo");
//         $_SESSION['flag'] = 2;
//         $_SESSION['message'] = "You are not Authorized as ADMIN";
//         header("Location: ../login.php");
//         exit(0);
//     }
// }

?>