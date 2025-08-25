<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
?>

 <div class="main-content">


 
 <?php
          $id=$_GET['id'];
          $students= getStudentById($id);
          $name=$students['student_name'];
          $mobile=$students['student_mobile'];
          $sex=$students['student_sex'];
          $status=$students['student_status'] ;        
           
          if(isset($_POST['btnupdate'])){
            if(updateStudent($_POST,$students['id'])){
                header('location:students.php');
            }else{
                echo '<div class="alert alert-danger">Has no Data succesfully</div>';
            }
        }
          ?>

            

    <form action="update-student.php?id=<?php echo $id?>" method="POST">
     <div class="card w-50">
        <!----card header---->
        <div class="card-header bg-primary text-white">
            <h2 class="card-title">Student update</h2>
        </div>
         <!----card body--->
        <div class="card-body">

           
            <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Student name</label>
            <input type="text" name="studentName"value=<?php echo $name?>  placeholder="Enter Your Name"  class="form-control" />
          </div>
        </div>


        
        <div class="col-md-6">
          <div class="form-group">
            <label>Mobile</label>
            <input type="number" name="studentMobile" VALUE=<?php echo $mobile?>  class="form-control"/>
          </div>
        </div>


       </div> 
       <!--  row 2 -->
       <div class="row">
       <div class="col md-6">
          <div class="form-group">
            <label>  Sex </label>
            <select name="sex"  class="form-control">
              <option>........</option>
              <option value="male" <?php echo $sex=='Male' ? 'selected' : ''?>>Male</option>
                <option value="female" <?php echo $sex=='Female' ? 'selected' : ''?>>Female</option>
            </select>
          </div>
        </div>

        <div class="col md-6">
          <div class="form-group">
            <label>  Status </label>
            <select name="status"  class="form-control">
              <option>........</option>
              <option value="Active" <?php echo $status=='Active' ? 'selected' : ''?>>Active</option>
                <option value="Inactive" <?php echo $status=='Inactive' ? 'selected' : ''?>>Inactive</option>
            </select>
          </div>
        </div>

       </div>


            <!-- submit button -->
            <div class="pull-right">
            <button type="submit"  class ="btn btn-primary" name="btnupdate">Update</button>
            </div>
        </div>
       

     </div>
   </form> 
  </div>


<?php    
  include_once('includes/footer.php')
  ?>