<?php include "inc/header.php";?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
        </div>

        <div class="container">
        <?php
            if(isset($_GET['roll'])) {
                $roll = $_GET['roll'];
                $query_get = "SELECT * FROM students WHERE roll = '$roll'";
                $post_one = $db->select($query_get);
            }
         
            if($post_one) {
            while($students_one = $post_one->fetch_assoc()) {
         ?>
<div class="card">
    <div class="card-header bg-primary">
        <h3 class="text-center text-light"><?= $students_one['name']; ?></h3>
    </div>
</div>
<?php } } ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Session</th>
            <th>Address</th>
            <th>Photo</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['roll'])) {
                $roll = $_GET['roll'];
                $query = "SELECT * FROM students WHERE roll = '$roll'";
                $post = $db->select($query);
                $serial = 0;
            }
         
            if($post) {
            while($students = $post->fetch_assoc()) {
         ?>
        <tr>
            <td><?= ++$serial; ?></td>
            <td><?= $students['name'];?></td>
            <td><?= $students['email'];?></td>
            <td><?= $students['roll'];?></td>
            <td><?= $students['phone'];?></td>
            <td><?= $students['session'];?></td>
            <td><?= $students['address'];?></td>
            <td><img src="./uploads/photo/<?= $students['photo'];?>" width="100" alt=""></td>
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