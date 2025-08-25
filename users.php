<?php

include_once('includes/head.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');


?>
<div class="main-content">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <div class="row">
        <div class="col-md-10">
          <h2 class="card-tittle">Users Managments</h2>
        </div>
        <div class="col-md-2">
          <a href="Add-users.php" class="btn btn-success"></i>Add New</a>
        </div>
      </div>

    </div>
    <div class="card-body">
      <?php
      $users = getusers();
      ?>

      <table id="example1" class="table table-bordered table-striped">

        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>

            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($users as $user) {
          ?>
            <tr>
              <td><?php echo $user['id'] ?></td>
              <td><?php echo $user['username'] ?></td>
              <td><?php echo $user['role'] ?></td>
              <td>
                <?php
                if ($user['status'] == 'Active') {  ?>
                  <span class="badge badge-success">Active</span>
                <?php  } else { ?>
                  <span class="badge badge-danger">Inactive</span>
                <?php } ?>

              </td>
              <td>
                <a href="updateusers.php?id=<?php echo $user['id'] ?>" class="btn btn-success btn-sm">Update</a>
                <form action="Deleteusers.php" method="post" style="display:inline;">
                  <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                  <button type="submit" name="btndelete" class="btn btn-danger btn-sm" onclick="return checkDelete()">Delete</button>
                </form>
              </td>
            </tr>


            </tr>
          <?php } ?>
        </tbody>
      </table>




    </div>
  </div>
</div>
</div>







<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      //   "buttons": ["excel", "pdf","print" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</div>
</div>


</div>
<script>
  function checkDelete() {
    return confirm("are you want to delete Data destination");
  }
</script>
</div>
</div>
</div>>


<?php
include_once('includes/footer.php')
?>