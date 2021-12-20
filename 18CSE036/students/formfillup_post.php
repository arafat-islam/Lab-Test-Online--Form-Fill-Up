<?php
include "../lib/Session.php";
include "../config/config.php";
include "../lib/Database.php";
Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        $semester = $_POST['semester'];
        $session = $_POST['session'];
        $subject = $_POST['subject'];
        $roll = $_POST['roll'];



        if(empty($semester) || empty($session) || empty($subject)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: formfilup.php");
        } else {
            
                $get = "SELECT * FROM form_data WHERE form_roll = '$roll'";
                $post = $db->select($get);

                if(!$post) {
                $query = "INSERT INTO `form_data`(`form_roll`, `semester`, `session`, `subjects`) VALUES ('$roll','$semester','$session','$subject')"; 

                if($db->insert($query)) {
                    $_SESSION['form_fill_up_done'] = "Form Fill Up Done!";
                    header("location: formfilup.php");
                } 
                
            }else {
                    $_SESSION['already_fillup'] = "You have already Fill Up the form!";
                    header("location: formfilup.php");
                }
            }
  
    }
