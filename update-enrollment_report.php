<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
?>

<div class="main-content">



  <?php
  $id = $_GET['id'];
  $enrollment = getEnrollmentReportById($id);
  $name = $enrollment['student_name'];
  $mobile = $enrollment['student_mobile'];
  $course = $enrollment['course_name'];
  $Erollmentdate = $enrollment['enrollment_date'];
  $fee = $enrollment['course_fee'];

  if (isset($_POST['btnupdate'])) {
    if (updateEnrollment($_POST, $enrollment['id'])) {
      header('location:enrollment.php');
    } else {
      echo '<div class="alert alert-danger">Has no Data succesfully</div>';
    }
  }
  ?>



  <form action="update-enrollment_report.php?id=<?php echo $id ?>" method="POST">
    <div class="card w-50">
      <!----card header---->
      <div class="card-header bg-primary text-white">
        <h2 class="card-title">Enroolment update</h2>
      </div>
      <!----card body--->
      <div class="card-body">


        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>name</label>
              <input type="text" name="studentName" value="<?php echo $name ?>" placeholder="Enter Your Name" class="form-control" />
            </div>
          </div>



          <div class="col-md-6">
            <div class="form-group">
              <label>mobile</label>
              <input type="number" name="studentMobile" VALUE="<?php echo $mobile ?>" placeholder="Enter Your mobile" class="form-control" />
            </div>
          </div>


        </div>
        <!--  row 2 -->
        <div class="row">
          <div class="col md-6">
            <div class="form-group">
              <label> Course </label>
              <input type="text" name="courseName" value="<?php echo $course ?> " placeholder="Enter coursename" class="form-control">
            </div>
          </div>

          <div class="col md-6">
            <div class="form-group">
              <label> date </label>
              <input type="date" name="Erollmentdate" value="<?php echo $Erollmentdate ?>" class="form-control">
            </div>
          </div>

        </div>
        <!---- row 3-->

        <div class="row">
          <div class="col md-6">
            <div class="form-group">
              <label>fee </label>
              <input name="courseFee" value="<?php echo $fee ?>" type="text" placeholder="Enter course Fee" class="form-control">
            </div>
          </div>




        </div>


        <!-- submit button -->
        <div class="pull-right">
          <button type="submit" class="btn btn-primary" name="btnupdate">Update</button>
        </div>
      </div>


    </div>
  </form>
</div>
<?php
include_once('includes/footer.php')
?>