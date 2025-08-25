<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');


?>

    <div class="main-content">

      <?php 
    if (isset($_GET['id']))  {
        if (deleteCourseById($_GET['id'])) {
            echo "<div class = 'alerr alert-success'>Course has been Deleted <a class='btn btn-primary' href ='courses.php'> Back</a></div>";
        } else {
            echo "<div class = 'alerr alert-danger'> NO Course Deleted</div>";

        }


    }
    
    
      ?>
    </div>


<?php    
  include_once('includes/footer.php')
  ?>