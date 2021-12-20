<?php include "./inc/header.php";?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="sl-page-title">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                        <h4>Welcome</h4>
                        </div>
                        <div class="card-body">
                            <p>Thanks for login</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                        <h6>Current Semeter</h6>
                        </div>
                        <div class="card-body">
                            <p>5th</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                        <h6>From Fill up</h6>
                        </div>
                        <div class="card-body">
                            <p>You can form Fill up now</p>
                        </div>
                    </div>
                </div>
            </div>
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