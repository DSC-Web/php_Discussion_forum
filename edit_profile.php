<?php
session_start();
include('includes/connect.php');
include ('functions/functions.php');

if(!isset($_SESSION['email'])){
    header('location: index.php');
}
else{
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Discusly - We Dicuss Here</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/home_style.css" rel="stylesheet">
        <style>
            #form_field{
                margin-bottom: 10px;
            }
        </style>

    </head>

    <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="home.php"><h3>Discusly</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="edit_profile.php">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">
                    <small>Edit The Profile</small>
                </h1>

                <!--Post -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title"><strong>Please Enter Your Updated Details ...</strong> </h3>
                        <form action="home.php?id=<?php echo $user_id; ?>" method="post">
                            <input type="text" class="form-control" value="<?php echo $row['username'] ?>" name="name" required id="form_field">
                            <input type="password" class="form-control" value="<?php echo $user_password; ?>" id="form_field" name="password">
                            <input type="email" class="form-control" value="<?php echo $row['email'];?>" id="form_field" name="email">
                            <select name="country" class="float-right form-control" id="form_field" required id="form_field">Select a Country
                                <option value='#'>Select a Country</option>
                                <option value="U.S.">U.S.</option>
                                <option value="U.K.">U.K.</option>
                                <option value="India">India</option>
                                <option value="China">China</option>
                            </select>

                            <input class="float-right  btn btn-success" name="edit" type="submit" value="Submit">
                        </form>
                        <?php edit_user(); ?>
                    </div>
                    <div class="card-footer text-muted">

                    </div>
                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <div class="card my-4">
                    <!--                <h5 class="card-header">Search</h5> -->
                    <img class="card-img-top" src="images/manager-512.jpg" style="height: 290px; padding-right: 20px;padding-left: 20px;" alt="Card image cap">
                    <div class="card-body">
                        <?php
                        find_user();
                        echo" <h5><strong>Name</strong>: ".$row['username']."</h5>";
                        echo" <h5><strong>Country</strong>: ".$row['user_country']."</h5>";
                        echo" <h5><strong>Last Login</strong> : ".$row['last_login']."</h5>";
                        echo" <h5><strong>Member Since</strong> : ".$row['register_date']."</h5>";
                        ?>
                    </div>
                </div>
                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search Here</h5>
                    <div class="card-body">
                        <p>
                        <form action="results.php"  method="get" class="form-check-inline" >
                            <input type="text" class="form-control" style="margin-right: 10px;" name="user_query" placeholder="Search Here...">
                            <input type="submit" value="Search" class="form-control btn-group-sm  btn-success">
                        </form></p>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    </body>
    </html>
<?php }?>