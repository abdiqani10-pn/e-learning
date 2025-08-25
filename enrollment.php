<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');


?>

<div class="main-content">

  <div class="row">
    <div class="col-md-8 col-lg-6 col-sm-12">
      <div class="card">
        <div class="card-header bg-primary text-white">

          <h2 class="card-tittle">Enrollment</h2>
        </div>

        <div class="card-body">
          <?php
          $studentid="";
          $courseid="";
          $EnrollmentDate="";

          if (isset($_POST['btnSubmit'])) {
             $studentid = $_POST['studentid'];
             $courseid = $_POST['courseid'];
             $EnrollmentDate = $_POST['EnrollmentDate'];
            if (enrollCourse($_POST)) {
              header('location: enrollment.php');
            }
          }

          $students = getStudents();
          $courses = getCourses();

          ?>
          <form action="enrollment.php" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Select student</label>
                  <select name="studentid"    id="studentid" class="form-control">
                    <option value="">....</option>
                    <?php
                    foreach ($students as $student) {
                    ?>
                  <option value="<?php echo $student['id']; ?>" <?php  echo  ($studentid == $student['id']) ? "selected" : '' ; ?> ><?php echo $student['student_name'];  ?></option>

                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Select course</label>
                  <select name="courseid" id="courseid" class="form-control">
                    <option value="">....</option>
                    <?php
                    foreach ($courses as $course) {
                    ?>
                  <option value="<?php echo $course['id']; ?>"   <?php  echo  ($courseid == $course['id']) ? "selected" : '' ; ?>  > <?php echo $course['course_name'];  ?></option>

                    <?php } ?>
                  </select>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Enrollment date</label>
                  <input type="date" value="<?php echo $EnrollmentDate; ?>" class="form-control" name="EnrollmentDate">
                </div>
              </div>
              <div class="col-md-6">
                <button class="btn btn-success btn-block btn-sm mt-4" name="btnSubmit">Save</button>
              </div>

            </div>

          </form>
        </div>


      </div>
    </div>
  </div>


</div>


<?php
include_once('includes/footer.php')
?>