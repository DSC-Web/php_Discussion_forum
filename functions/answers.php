<?php

$get_id = $_GET['post_id'];
$get_answers="select * from answers WHERE post_id='$get_id'";
$run_answers=mysqli_query($con,$get_answers);

while ($row=mysqli_fetch_array($run_answers))
{
    $answer=$row['answer'];
    $ans_id=$row['user_id'];
    $run_by="select * from users WHERE user_id='$ans_id'AND posts='yes'";

    $run_user=mysqli_query($con,$run_by);
    $row_user1=mysqli_fetch_array($run_user);
    $ans_by=$row_user1['username'];
    $date_ans = $row['date'];
    echo "
               <div class=\"card mb-4\">
                    <div class=\"card-body\">
                    <p class='card-title'><img src='images/profile.png' style='height: 35px; width: 33px;'>&nbsp;<strong style='font-size: 22px; margin-top: 10px;'>".$ans_by."</strong></p> 
                        <p class=\"card-text\">".$answer."</p>
                    </div>
                    <div class=\"card-footer text-muted\">
                        Posted on ".$date_ans."
                    </div>
                </div>
     ";
}



?>