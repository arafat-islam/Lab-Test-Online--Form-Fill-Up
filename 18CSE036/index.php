<?php include "./inc/header.php";?>

<?php
            $query = "SELECT * FROM students";
            $post = $db->select($query);
            if($post) {
            $rows = mysqli_num_rows($post);

            
     
         ?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="sl-page-title">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                        <h4>Welcome To Admin Dashboard</h4>
                        </div>
                        <div class="card-body">
                            <p>Thanks for login. You're the admin, So you have the right to edit, delete, update or insert a new Students Data</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                        <h6>Total Students</h6>
                        </div>
                        <div class="card-body">
                            <h6><?= $rows; ?></h6>
                        </div>
                    </div>
                </div>
          
            </div>
        </div>
    </div>
</div>
<!-- ########## END: MAIN PANEL ########## -->
<?php } ?>
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