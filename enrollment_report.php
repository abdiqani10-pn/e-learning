<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');


?>

<div class="main-content">

  <div class="card">
    <div class="card-header bg-primary text-white">
      <form action="enrollment_report.php" method="POST">
        <?php
        $courses = getCourses();
        ?>
        <div class="row">
          <div class="col-md-6">
            <h2 class="card-tittle">Enrollment Report</h2>
          </div>

          <div class="col-md-4">

            <select name="courseid" id="" class="form-control">
              <option value="0">Select course</option>
              <?php
              foreach ($courses as $course) {  ?>
                <option value="<?php echo $course['id']; ?>"> <?php echo $course['course_name'];  ?></option>

              <?php } ?>
            </select>
          </div>

          <div class="col-md-2">
            <button class="btn btn-success btn-sm" name="btnSearch">Search</button>
          </div>

        </div>
      </form>

    </div>


    <div class="card-body">

      <?php
      if (isset($_POST['btnSearch'])) {

        $enrollment = getEnrollmentReport($_POST['courseid']);


      ?>

        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>name</th>
              <th>mobile</th>
              <th>course</th>
              <th>date</th>
              <th>fee</th>
              <th>
                Actions
              </th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($enrollment as $row) { ?>

              <tr>
                <td> <?php echo $row['id']; ?> </td>
                <td> <?php echo $row['student_name']; ?> </td>
                <td> <?php echo $row['student_mobile']; ?> </td>
                <td> <?php echo $row['course_name']; ?> </td>
                <td> <?php echo $row['enrollment_date']; ?> </td>
                <td>$<?php echo $row['course_fee']; ?> </td>
                <td>
                  <a href="update-enrollment_report.php?id= <?php echo $row['id']; ?>" class="btn btn-success">Update</a>
                  <a href="delete-enrollment_report.php?id= <?php echo $row['id']; ?>" class="btn btn-danger" onclick="return checkDelete()">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>

        </table>
      <?php
      }

      ?>
    </div>


    <script>
      function checkDelete() {
        return confirm("are you want to delete Data destination");
      }
    </script>
  </div>

</div>


<?php
include_once('includes/footer.php')
?>