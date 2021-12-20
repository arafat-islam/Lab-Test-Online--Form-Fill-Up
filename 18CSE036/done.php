<?php

    include "./config/config.php";
    include "./lib/Database.php";
    $db = new Database();
    $query = "UPDATE form_data SET status = 1";
    $db->update($query);
    header("location: studentformfilluprequest.php");
