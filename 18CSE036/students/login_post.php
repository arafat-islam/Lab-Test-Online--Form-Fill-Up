<?php
    include "../lib/Session.php";
    include "../config/config.php";
    include "../lib/Database.php";
    Session::init();
    $db = new Database();

    if(isset($_POST['submit'])) {
        $roll = $_POST['roll'];
        $phone = $_POST['phone'];

        if(!empty($roll) && !empty($phone)) {
            $query = "SELECT * FROM students WHERE roll = '$roll' AND phone = '$phone'";
            // echo $query;
            // die();
            $post = $db->select($query);

            if($post) {
                Session::set("stulogin", true);

                Session::set("roll", $roll);
                
                Session::set('students_mode', true);
                Session::set("login_message", true);
                header("location: index.php");
            } else {
                Session::set("user_not_found", "Fields Must not be empty");
            header("location: login.php");
            }

        } else {
            Session::set("empty", "Fields Must not be empty");
            header("location: login.php");
        }
     

    }
