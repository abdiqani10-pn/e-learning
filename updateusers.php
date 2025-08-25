<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');


?>


<div class="main-content">
        <?php
        $username='';
        $id=$_GET['id'];
        $users=getusersByid($id);
        $username=$users['username'];
        $role=$users['role'];
        $status=$users['status'];
        if(isset($_POST['btnupdate'])){
            if(updateusers($_POST,$users['id'])){
                header('location:users.php');
            }else{
                echo '<div class="alert alert-danger">Has no Data succesfully</div>';
            }
        }
        ?>
        <form action="updateusers.php?id=<?php echo $id?>" method="post">
      <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-tittle"> Update users</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username;?>" class="form-control" placeholder="Enter Username">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label>password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                    <option vlaue="Admin" <?php echo $role=='admin'? 'selected' : '' ?> >Admin</option>
                    <option vlaue="User" <?php echo $role=='user'? 'selected' : '' ?>>User</option>
                    </select>
                </div>
                </div>
                <div class="col-md-5">
                <div class="form-group">
                    <label>status</label>
                    <select name="status" class="form-control">
                    <option vlaue="Active" <?php echo $status=='active' ? 'selected' : '' ?>>Active</option>
                    <option vlaue="Inactive"  <?php echo $status=='inactive'? 'selected' : '' ?> >Inactive</option>
                    </select>
                </div>
                </div>
                <div class="col-md-2" style="margin-top:34px;">
                    <button type="submit" name="btnupdate" class="btn btn-primary btn-sm btn-block">Update</button>
                </div>
            </div>
        </div>
      </div>
      </form>
    </div>
   


<?php    
  include_once('includes/footer.php')
  ?>