<?php

include "../lib/Session.php";
include "../config/config.php";
include "../lib/Database.php";
Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        if(isset($_GET['roll'])) {
            $roll = $_GET['roll'];

        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $session = $_POST['session'];
        $address = $_POST['address'];

      
       
        
                $query = "UPDATE students set name = '$name', email = '$email', phone = '$phone',  session = '$session', address = '$address' WHERE roll = '$roll' "; 

           
           
                if($db->update($query)) {
                    move_uploaded_file($tmp_name, "../uploads/photo/$filename");
                    $_SESSION['updated'] = "Students Updated!";
                    header("location: ../index.php");
                }
            
        }
 
