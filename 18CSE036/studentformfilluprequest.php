<?php include "inc/header.php";?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
        </div>

        <div class="container">

<div class="card">
    <div class="card-header bg-primary">
        <h3 class="text-center text-light">Form Submitted By Students</h3>
    </div>
</div>


<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Semester</th>
            <th>Roll</th>
            <th>Session</th>
            <th>Subject</th>
            <th>Status</th>
            <th scope="col" colspan="3" class='text-center'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM form_data";
            $post = $db->select($query);
            $serial = 0;
            if($post) {
            while($students = $post->fetch_assoc()) {
         ?>
        <tr>
            <td><?= ++$serial; ?></td>
            <td><?= $students['semester'];?></td>
            <td><?= $students['form_roll'];?></td>
            <td><?= $students['session'];?></td>
            <td><?= $students['subjects'];?></td>
            <td><?php 
                if( $students['status'] == 1) {
                    echo "<span style='color:green;'>Complete</span>";
                } else {
                    echo "<span style='color:red;'>Incomplete</span>";
                }
            ?></td>
            <td><a href="done.php">Mark As Done</a></td>
        </tr>
     

        <?php } } ?>
    </tbody>
</table>
</div>
</div>
</div>
    <!-- ########## END: MAIN PANEL ########## -->

<?php include "inc/footer.php";?>


<?php if(Session::get("deleted_students")) : ?>

<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Students Deleted!'
})
</script>

<?php endif; unset($_SESSION['deleted_students']); ?>

  <!-- SIGN UP SUCCESS ALERT -->
  <?php if(isset($_SESSION['updated'])) { ?>
    <script>
        Swal.fire(
            'Success',
            'Student Updated Successfully',
            'success'
        )
    </script>
    <?php } unset($_SESSION['updated']); ?>



    <?php if(Session::get("login_message")) : ?>

<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Login Successfully!'
})
</script>

<?php endif; unset($_SESSION['login_message']); ?>
