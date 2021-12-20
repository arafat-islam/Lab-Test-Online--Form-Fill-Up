<?php include "inc/header.php"; ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">

        <div class="col-md-8 m-auto">
            <form action="formfillup_post.php" method="post">
                <div class="row">
                    <h3>From Fill Up</h3>
                    <div class="col-md-12">
                       <label for="semester">Semester</label>
                       <select name="semester" class="form-control" id="">
                           <option value="1st">1st</option>
                           <option value="2nd">2nd</option>
                           <option value="3rd">3rd</option>
                           <option value="4th">4th</option>
                           <option value="5th">5th</option>
                           <option value="6th">6th</option>
                           <option value="7th">7th</option>
                           <option value="8th">8st</option>
                       </select>
                    </div>
                    <div class="col-md-12">
                       <label for="session">Session</label>
                       <select name="session" class="form-control" id="">
                           <option value="2011-12">2011-12</option>
                           <option value="2012-13">2012-13</option>
                           <option value="2013-14">2013-14</option>
                           <option value="2014-15">2014-15</option>
                           <option value="2015-16">2015-16</option>
                           <option value="2016-17">2016-17</option>
                           <option value="2017-18">2017-18</option>
                           <option value="2018-19">2018-19</option>
                       </select>
                    </div>
                    <div class="col-md-12">
                       <label for="semester">Subjects</label>
                        <input type="text" class="form-control" name="subject" id="">
                    </div>
                    <div>
                        <input type="hidden" name="roll" value="<?php echo Session::get('roll'); ?>">
                    </div>
                </div>
                <input class="btn btn-primary mt-3" name="submit" type="submit" value="Submit">
            </form>
        </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <?php include "inc/footer.php"; ?>

    <!-- SIGN UP SUCCESS ALERT -->
    <?php if(isset($_SESSION['form_fill_up_done'])) { ?>
    <script>
        Swal.fire(
            'Success',
            'Form Fill Up done Successfully',
            'success'
        )
    </script>
    <?php } unset($_SESSION['form_fill_up_done']); ?>



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


    <?php if(isset($_SESSION['already_fillup'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?php echo $_SESSION['already_fillup']; ?>',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
    <?php } unset($_SESSION['already_fillup']);?>

