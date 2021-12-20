<?php

include "../lib/Session.php";
include "../config/config.php";
include "../lib/Database.php";
Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $roll = $_POST['roll'];
        $phone = $_POST['phone'];
        $session = $_POST['session'];
        $address = $_POST['address'];

        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $extension = explode('.', $filename);
        $extension = end($extension);
        $allowed_extension = array("jpg", "png", "jpeg", "webp");
       
        if(empty($name) || empty($email) || empty($roll) || empty($session)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../addstudents.php");
        } else {
            if(in_array($extension, $allowed_extension)) {
                $query = "INSERT INTO students (name, email, roll, phone, session, address, photo) VALUES ('$name', '$email', '$roll', '$phone', '$session', '$address', '$filename')"; 
           
                if($db->insert($query)) {
                    move_uploaded_file($tmp_name, "../uploads/photo/$filename");
                    $_SESSION['students_aadded'] = "Students Added!";
                    header("location: ../addstudents.php");
                }
            }
        }
    }
