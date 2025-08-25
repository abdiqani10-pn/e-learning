<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
?>


<div class="main-content">
  <div class="card">
    <!---card header--->
    <div class="card-header bg-success text-white">
      <div class="row">
        <div class="col-md-8">
          <h1 class="card-title">courses list</h1>
        </div>

        <div class="col-md-4">
          <a href="add-course.php" class="btn btn-primary"> New course</a>
        </div>
      </div>
    </div>

    <!---- card body------>
    <div class="card-body">
      <?php
      $courses = getCourses();

      ?>
      <table class="table ">
        <!-- table-bordered waa hda rabto in border lo sameyo table kaaga -->

        <thead>
          <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Date</th>
            <th>Course Fee</th>
            <th>Course Duration</th>
            <th>Actions</th>


          </tr>
        </thead>

        <tbody>
          <?php foreach ($courses as $course) {  ?>

            <tr>
              <td><?php echo $course['id']; ?></td>
              <td><?php echo $course['course_name']; ?></td>
              <td><?php echo $course['course_date']; ?></td>
              <td> $<?php echo $course['course_fee']; ?></td>
              <td><?php echo $course['course_duration']; ?></td>


              <td>
                <a href="update-course.php?id= <?php echo $course['id']; ?>" class="btn btn-success btn-sm">Update </a>
                <a href="delete-course.php?id= <?php echo $course['id']; ?>" class="btn btn-danger btn-sm" onclick="return checkDelete()">Delete </a>

              </td>
            </tr>

          <?php } ?>

        </tbody>
      </table>

    </div>

    <script>
      function checkDelete() {
        return confirm("are you want to delete this Course");
      }
    </script>

  </div>

</div>


<?php
include_once('includes/footer.php');
?>