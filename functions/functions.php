<?php
$con= mysqli_connect("localhost","root","","forum") or die("Connection was not established");

$email=$_SESSION['email'];
$get_user="select * from users where email='$email'";
$run_user=mysqli_query($con,$get_user);
$row=mysqli_fetch_array($run_user);
$user_id=$row['user_id'];
$user_password=$row['password'];

function find_user()
{
    global $con;
    $email=$_SESSION['email'];
    $get_user="select * from users where email='$email'";
    $run_user=mysqli_query($con,$get_user);
    global $row ;
    $row=mysqli_fetch_array($run_user);
    global $user_id;
    $user_id=$row['user_id'];
}

function insert_post()
{
    global $user_id;
    global $con;
    if(isset($_POST['submit'])) {
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']);
        $topic = mysqli_real_escape_string($con, $_POST['topic']);
        if ($content == '') {
            echo "<script>alert('Please Enter Description !!!')</script>";
            exit();
        } else {
            $insert = "insert into `posts`(`user_id`,`topic_title`,`post_title`,`post_content`,`post_date`) values('$user_id','$topic','$title','$content',NOW())";
            $run = mysqli_query($con, $insert) or die(mysqli_error($con));

            if ($run) {
                echo "<script>alert(' Posted Submiited Succesfully !!')</script>";
                $update = "update users set posts='yes' where user_id='$user_id' ";
                $run_update = mysqli_query($con, $update);
            }

        }
    }
}
function get_posts()
{
    global $con;
    $per_page=4;
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else{
        $page =1;
    }
    $start_from = ($page-1)*$per_page;
    $get_posts="select * from posts ORDER BY 1 DESC LIMIT $start_from,$per_page";
    $run_posts=mysqli_query($con,$get_posts);
    while($row_posts=mysqli_fetch_array($run_posts)){

        $post_id= $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $post_title=$row_posts['post_title'];
        $content=$row_posts['post_content'];
        if (strlen($content) > 25)
        { $content = substr($content, 0, 100);}
        $post_date = $row_posts['post_date'];

        $user="select * from users WHERE user_id='$user_id'AND posts='yes'";

        $run_user=mysqli_query($con,$user);
        $row_user=mysqli_fetch_array($run_user);
        $user_name=$row_user['username'];

        echo"
        <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"card-title\">".$post_title."</h2>
                    <p class=\"card-text\">".$content."...</p>
                    <a href=\"single.php?post_id=".$post_id."\" class=\"btn btn-primary\">Read More &rarr;</a>
                </div>
                <div class=\"card-footer text-muted\">
                    Posted on ".$row_posts['post_date']." By
                    <a href=\"#\"> ".$user_name."</a>
                </div>
         </div>
        ";
    }
    include('pagination.php');
}
function single_post()
{
    global $con;
    if(isset($_GET['post_id']))
    {

        $get_id = $_GET['post_id'];
        $get_posts="select * from posts WHERE post_id='$get_id'";
        $run_posts=mysqli_query($con,$get_posts);
        $row_posts=mysqli_fetch_array($run_posts);

            $post_id= $row_posts['post_id'];
            $user_id = $row_posts['user_id'];
            $post_title=$row_posts['post_title'];
            $content=$row_posts['post_content'];
            $post_date = $row_posts['post_date'];

            $user="select * from users WHERE user_id='$user_id'AND posts='yes'";

            $run_user=mysqli_query($con,$user);
            $row_user=mysqli_fetch_array($run_user);
            $user_name=$row_user['username'];

            echo"
              <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"card-title\">".$post_title."</h2>
                    <p class=\"card-text\">".$content."</p>
                </div>
                <div class=\"card-footer text-muted\">
                    Posted on ".$row_posts['post_date']." By
                    <a href=\"#\"> ".$user_name."</a>
                </div>
              </div>";

            include('answers.php');

            echo"<div class=\"card mb-4\">
                    <div class=\"card-body\">
                    <h4 class='card-title'>Please Write Your Answer ...</h4>
                    <p class='card-title'><img src='images/profile.png' style='height: 35px; width: 33px;'>&nbsp;<strong style='font-size: 22px; margin-top: 10px;'>".$user_name."</strong></p> 
                        <form action='' class='form-group' method='post'>
                               <textarea class='form-control' name='answer' id='' cols='70' rows='3' placeholder='Write your Answer Here ...'></textarea>
                               <input type='submit' name='ans1' class='btn btn-success float-left' style='margin-top: 10px;'>
                        </form>
                    </div>
                    <div class=\"card-footer text-muted\">
                    </div>
                </div>
               ";

                if (isset($_POST['ans1'])) {


                    $answer = $_POST['answer'];
                    if (!($answer == '')) {

                        $insert = "insert into answers (post_id,user_id,answer,date) values ('$post_id','$user_id','$answer',NOW())";
                        $run = mysqli_query($con, $insert) or die("connection is not Established");
                        if ($run) {
                            echo "<script>alert('Answer Submitted successfully !!!')</script>";
                        }

                    }
                    else{
                        echo "<script>alert('Please Enter some Answer !!!!')</script>";
                    }
                }
    }
}
function get_results()
{
    global $con;

    if(isset($_GET['user_query'])){
        $search_term = $_GET['user_query'];
    }

    $get_posts="select * from posts WHERE post_title LIKE '%$search_term%'";
    $run_posts=mysqli_query($con,$get_posts);

    $count=mysqli_num_rows($run_posts);
    if($count==0)
    {
        echo "<h3 class=\"my-4 badge-danger\">Sorry, WE Don't Have Any Matching ... </h3>";
        exit();
    }

    while($row_posts=mysqli_fetch_array($run_posts)){

        $post_id= $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $post_title=$row_posts['post_title'];
        $content=$row_posts['post_content'];
        if (strlen($content) > 25)
        { $content = substr($content, 0, 100);}
        $post_date = $row_posts['post_date'];

        $user="select * from users WHERE user_id='$user_id'AND posts='yes'";

        $run_user=mysqli_query($con,$user);
        $row_user=mysqli_fetch_array($run_user);
        $user_name=$row_user['username'];

        echo"
        <div class=\"card mb-4\">
                <div class=\"card-body\">
                    <h2 class=\"card-title\">".$post_title."</h2>
                    <p class=\"card-text\">".$content."...</p>
                    <a href=\"single.php?post_id=".$post_id."\" class=\"btn btn-primary\">Read More &rarr;</a>
                </div>
                <div class=\"card-footer text-muted\">
                    Posted on ".$row_posts['post_date']." By
                    <a href=\"#\"> ".$user_name."</a>
                </div>
         </div>
        ";
    }
}
//function edit_user()
//{
//    global $user_id;
//    global $con;
//    if(isset($_POST['edit']))
//    {
//        $username=$_POST['name'];
//        $password=$_POST['password'];
//        $email=$_POST['email'];
//        $country=$_POST['country'];
//
//    }
//}

?>