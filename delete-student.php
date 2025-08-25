<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');


?>

    <div class="main-content">

      <?php 
    if (isset($_GET['id']))  {
        if (deleteStudentById($_GET['id'])) {
            echo "<div class = 'alerr alert-success'>Student has been Deleted <a class='btn btn-primary' href ='students.php'> Back</a></div>";
        } else {
            echo "<div class = 'alerr alert-danger'> NO Student Deleted</div>";

        }


    }
    
    
      ?>
    </div>


<?php    
  include_once('includes/footer.php')
  ?>