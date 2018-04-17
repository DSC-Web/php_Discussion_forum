<?php


include_once('includes/connect.php');

if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $password =$_POST['password'];

    $query = "SELECT * FROM users WHERE email='".$email."' AND password ='".$password."' LIMIT 1 ";
    $res = mysqli_query($con,$query) or die(mysqli_error($con));

    if(mysqli_num_rows($res) == 1)
    {
        $row =mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] =$row['email'];
        echo "<script>window.open('home.php','_self')</script>";
    }
    else{
        echo "<script>alert('Incorect Credentials !!!!')</script>";
        exit();
    }
}
?>