<?php

    include "./lib/Session.php";
    Session::checkSession();

    Session::adminDestroy();

    header("location: login.php");