<?php
include ('includes/connect.php');
function insertUser()
{
    global $con;
    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($con,$_POST['name']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $confirm = mysqli_real_escape_string($con,$_POST['confirm']);
        $gender = mysqli_real_escape_string($con,$_POST['gender']);
        $country = mysqli_real_escape_string($con,$_POST['country']);
        $date = date("m-d-Y");
        $posts="No";

        $get_email ="SELECT * FROM users WHERE email='$email'";
        $run_email =mysqli_query($con,$get_email);
        $check =mysqli_num_rows($run_email);

        if($check == 1)
        {
            echo "<script>alert('Email is Already Registered !!! Try again ')</script>";
            exit();
        }
        if(strlen($password)<8)
        {
            echo "<script>alert('Password should be minimum 8 characters !!! Try again ')</script>";
            exit();
        }
        if(!($password == $confirm))
        {
            echo "<script>alert('Password and Confirm Password should be Same')</script>";
        }
        else{

            $insert = "insert into users(username,email,password,user_country,user_gender,register_date,last_login,posts) VALUES('$name','$email','$password','$country','$gender',NOW(),NOW(),'$posts')";
            $run_insert = mysqli_query($con,$insert);

            if($run_insert){
                $_SESSION['email']=$email;
                echo "<script>alert(' Registration Succesful !!')</script>";
                echo "<script>window.open('home.php','_self')</script>";
            }
        }


    }
}


?>