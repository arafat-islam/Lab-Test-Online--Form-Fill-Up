<?php

    include "../lib/Session.php";
    Session::checkSession();

    Session::studentDestroy();
    
    header("location: login.php");