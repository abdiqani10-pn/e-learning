<?php

include_once('includes/head.php');








if(isset($_POST['btndelete'])){
    if(Deleteusers($_POST['id'])){
  header('location:users.php');
    }
}

?>


  
  