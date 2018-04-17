<?php

session_start();
$con= mysqli_connect("localhost","root","","forum") or die("Connection was not established");

$user_id1=$_SESSION['user_id'];
$update_time="update users set last_login= NOW() WHERE user_id ='$user_id1'";
$run=mysqli_query($con,$update_time);
session_destroy();

header('location: index.php')

?>