<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');


?>

<div class="main-content">

  <div class="card">
    <!---card header--->

    <div class="card-header bg-primary text-white">
      <div class="row">
        <div class="col-md-10">
          <h2 class="card-title">
            Students list
          </h2>
        </div>
        <div class="col-md-2">
          <a href="add-students.php" class="btn btn-success">Add New</a>
        </div>
      </div>
    </div>



    <div class="card-body">
      <?php
      $students = getStudents();

      ?>
      <table class="table ">
        <!-- table-bordered waa hda rabto in border lo sameyo table kaaga -->

        <thead>
          <tr>
            <th>ID</th>
            <th>Student name</th>
            <th>Student mobile</th>
            <th>student sex</th>
            <th>Student status</th>
            <th>Action</th>


          </tr>
        </thead>

        <tbody>
          <?php foreach ($students as $student) {  ?>

            <tr>
              <td><?php echo $student['id']; ?></td>
              <td><?php echo $student['student_name']; ?></td>
              <td><?php echo $student['student_mobile']; ?></td>
              <td><?php echo $student['student_sex']; ?></td>

              <td>
                <?php
                if ($student['student_status'] == 'Active') {  ?>
                  <span class="badge badge-success">Active</span>
                <?php  } else { ?>
                  <span class="badge badge-danger">Inactive</span>
                <?php } ?>

              </td>

              <td>
                <a href="update-student.php?id= <?php echo $student['id']; ?>" class="btn btn-success btn-sm">Update </a>
                <a href="delete-student.php?id= <?php echo $student['id']; ?>" class="btn btn-danger btn-sm" onclick="return checkDelete()">Delete </a>

              </td>
            </tr>

          <?php } ?>

        </tbody>
      </table>

    </div>

    <script>
      function checkDelete() {
        return confirm("are you want to delete this student");
      }
    </script>
  </div>

</div>


<?php
include_once('includes/footer.php')
?>