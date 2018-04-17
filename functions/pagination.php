<?php
  $query = "select * from posts";
  $result = mysqli_query($con,$query);

  $total_records = mysqli_num_rows($result);

  $total_pages = ceil($total_records/$per_page);

       echo"<ul class=\"pagination justify-content-center mb-4\">
                <li class=\"page-item\">
                    <a class=\"page-link\" href='home.php?page=1'> First Page</a>
                </li>";
       if($total_pages<6)
       {
       $final_pages=$total_pages;
       }
       else{
           $final_pages=5;
       }
       for($i=1;$i<=$final_pages;$i++) {
           echo "<li class=\"page-item\">
                    <a class=\"page-link\" href='home.php?page=$i'>$i</a>
                </li>";
       }
       echo "<li class=\"page-item\"><a class=\"page-link\" href='home.php?page=$total_pages'>Last Page</a></li></ul>";

//       echo "<a href='home.php?page='".$total_pages."'></a>";

?>