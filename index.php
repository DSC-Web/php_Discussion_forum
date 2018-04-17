<?php
session_start();
//include("functions/functions.php");


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Document</title>
        <link rel="icon" href="../../../../favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style1.css">
        <!--       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->


    </head>
    <body>
        <div class="row">
            <div class="col-lg-12" style="background-color:#343A40 ">
                <div class="row">
                    <div class="col-2 offset-1">
                        <h1>
                            <a href="#" style="text-decoration: none;">
                                <i><ul>Discusly</ul></i>
                            </a></h1>
                    </div>
                    <div class="col-5 offset-4 ">
                        <form action="" method="post">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><label for="email">Email</label></td>
                                        <td><label for="password">Password</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="email" name="email" class=" form-control-sm" required></td>
                                        <td><input type="password" name="password" class="form-control-sm" required></td>
                                        <td><button type="submit" value="Log In" class="form-control-sm btn btn-success" id="btn" name="submit1">Log In</button></td>
                                    </tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row wrapper">
            
            <div class="col-sm-7" style="margin-top: 50px;">
              <h2 style="margin-left: 140px; color:white;text-shadow: 4px 2px 4px #000000; "> Join The Discusly Network Today !</h2>
               <img src="images/front.jpg" class="img-fluid" alt="" id=img1>
            </div>
            <div class="col-sm-5">
                <form action="" method="post" class="form-group">
                    <table style="margin-top: 40px;">
                        <tr><th><h2 style="color: white; text-shadow: 4px 2px 4px #000000;">Create an Account</h2></th></tr>
                        <tr><td >It's free and always will be.</td></tr>
                        <tr><td style="padding-top: 20px;"><input type="text" class=" form-control" required placeholder="Name" name="name"></td></tr>
                        <tr><td style="padding-top: 10px;"><input type="email" class="form-control" required placeholder="Email" name="email"></td></tr>
                        <tr><td style="padding-top: 10px;"><input type="password" class="form-control" required placeholder="Password" name="password"></td></tr>
                        <tr><td style="padding-top: 10px;"><input type="password" class="form-control" required placeholder="Confirm Password" name="confirm"></td></tr>
                        <tr><td style="padding-top: 10px;"><select name="gender" class="form-control" required>
                            <option value="">Select a Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select></td></tr>
                        <tr><td style="padding-top: 10px;"><select name="country" class="form-control" required>
                            <option value="">Select a Country</option>
                            <option value="U.S.">U.S.</option>
                            <option value="U.K.">U.K.</option>
                            <option value="India">India</option>
                            <option value="China">China</option>
                        </select></td></tr>
                        <tr><td style="padding-top: 10px;"><button type="submit" value="Create An Account" name="submit" class="form-control btn btn-success">Create an account</button></td></tr>
                    </table>
                </form>
                <?php include('register.php'); ?>
            </div>
        </div>
        <?php include('login.php')?>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    </body>
</html>