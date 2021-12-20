<?php
    include "./lib/Session.php";
    include "./config/config.php";
    include "./lib/Database.php";
    Session::init();

    $db  = new Database();

    if(isset($_GET['roll'])) {
        $roll = $_GET['roll'];
        $query = "DELETE FROM students WHERE roll = '$roll'";
        $post = $db->delete($query);
        if($post) {
            Session::set("deleted_students", true);
            header("location: index.php");
        } else {

        }
        
    }

