<?php
    include "../lib/Session.php";
    include "../config/config.php";
    include "../lib/Database.php";
    Session::init();
    $db = new Database();

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if(!empty($email) && !empty($phone)) {
            $query = "SELECT * FROM users WHERE email = '$email' AND phone = '$phone'";

            $post = $db->select($query);

            if($post) {
                Session::set("login", true);
                Session::set("admin_login", true);
                Session::set("login_message", true);
                header("location: ../index.php");
            } else {
                Session::set("user_not_found", "Fields Must not be empty");
            header("location: ../login.php");
            }

        } else {
            Session::set("empty", "Fields Must not be empty");
            header("location: ../login.php");
        }
     











    }

