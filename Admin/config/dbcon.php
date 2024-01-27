<?php

$host = "mysql.selfmade.ninja";
$username = "mhemanthkmr";
$password = "hemanth123";
$database = "mhemanthkmr_disaster";

$con = mysqli_connect("$host", "$username", "$password", "$database");
// print_r($con);
if(!$con) {
    header("Location: ../errors/404.html");
    die();
}
// echo "Connection Successfull";
