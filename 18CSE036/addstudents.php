<?php include "inc/header.php"; ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">

        <div class="col-md-8 m-auto">
            <form action="action/addstudents.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <h3>Add Students</h3>
                    <div class="col-md-12">
                        <label for="title">Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="description">Roll</label>
                        <input name="roll" type="text" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input name="phone" type="text" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="button">SESSION</label>
                        <input class="form-control" type="text" name="session" id="">
                    </div>
                    <div class="col-md-12">
                        <lab    el for="button">ADDRESS</label>
                        <input class="form-control" type="text" name="address" id="">
                    </div>
            
                    <div class="col-md-12">
                        <div>
                          <img width="200" alt="" id="output">   
                        </div>
                        <label for="profile_photo">Photo</label>
                        <input type="file" onchange="loadFile(event)" class="form-control" name="image" id="">
                    </div>
                </div>
                <input class="btn btn-primary mt-3" name="submit" type="submit" value="Add Students">
            </form>
        </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <?php include "inc/footer.php"; ?>

    <!-- SIGN UP SUCCESS ALERT -->
    <?php if(isset($_SESSION['students_aadded'])) { ?>
    <script>
        Swal.fire(
            'Success',
            'Student Added Successfully',
            'success'
        )
    </script>
    <?php } unset($_SESSION['students_aadded']); ?>



    <?php if(isset($_SESSION['empty'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?php echo $_SESSION['empty']; ?>',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    <?php } unset($_SESSION['empty']);?>


    <?php if(isset($_SESSION['user_exist'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?php echo $_SESSION['user_exist']; ?>',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    <?php } unset($_SESSION['user_exist']);?>

