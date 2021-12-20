<?php include "inc/header.php"; ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
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
             
        <div class="col-md-8 m-auto">
            <form action="action/updatestudent.php?roll=<?php echo $students['roll'];?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <h3>Edit Students</h3>
            <div class="col-md-12">
                        <label for="title">Name</label>
                        <input name="name" value="<?php echo $students['name'];?>" type="text" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label>Email</label>
                        <input name="email"  value="<?php echo $students['email'];?>" type="email" class="form-control">
                    </div>
                
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input name="phone"  value="<?php echo $students['phone'];?>" type="text" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="button">SESSION</label>
                        <input class="form-control"  value="<?php echo $students['session'];?>" type="text" name="session" id="">
                    </div>
                    <div class="col-md-12">
                        <lab    el for="button">ADDRESS</label>
                        <input class="form-control"  value="<?php echo $students['address'];?>" type="text" name="address" id="">
                    </div>
                    <div class="col-md-12">
                        <img src="./uploads/photo/<?php echo $students['photo'];?>" width="200" alt="">
                    </div>
                    <div class="col-md-12">
                        <div>
                          <img width="200" alt="" id="output">   
                        </div>
                        <label for="profile_photo">Photo</label>
                        <input type="file" onchange="loadFile(event)" class="form-control" name="image" id="">
                    </div>
                </div>
                <input class="btn btn-primary mt-3" name="submit" type="submit" value="Update Student Information">
            </form>
        </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php } } ?>

    <?php include "inc/footer.php"; ?>

  


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

