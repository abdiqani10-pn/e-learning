<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');


?>
 <div class="main-content">
 <?php
        if(isset($_POST['btnsave'])){
            if(Addusers($_POST)){
                header('location:users.php');
            }else{
                echo '<div class="alert alert-danger">Has no Data succesfully</div>';
            }
        }
        ?>
        <form action="" method="post">
      <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-tittle"></i>Users</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username">
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
                    <option vlaue="Admin">Admin</option>
                    <option vlaue="User">User</option>
                    </select>
                </div>
                </div>
                <div class="col-md-5">
                <div class="form-group">
                    <label>status</label>
                    <select name="status" class="form-control">
                    <option valuue="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    </select>
                </div>
                </div>
                <div class="col-md-2" style="margin-top:34px;">
                    <button type="submit" name="btnsave" class="btn btn-primary btn-sm btn-block">save</button>
                </div>
            </div>
        </div>
      </div>
      </form>

</div>


<?php    
  include_once('includes/footer.php')
  ?>