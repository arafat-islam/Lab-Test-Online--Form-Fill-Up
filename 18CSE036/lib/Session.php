<?php
// Session Class 
class Session {
    public static function init() {
        session_start();
    }

    public static function set($key, $val) {
        $_SESSION[$key] = $val;
    }

    public static function get($key) {
        if(isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkSession() {
        self::init();
        if(self::get("admin_login") == false) {
            self::adminDestroy();
            header("location: login.php");
        }
    }

    public static function loginCheck() {
        self::init();
        if(self::get("admin_login") == true) {
            header("location: index.php");
        }
    }
    public static function studentLoginCheck() {
        self::init();
        if(self::get("students_mode") == false) {
            header("location: login.php");
        }
    }

    public static function adminDestroy() {
        unset($_SESSION['admin_login']);
        header("location: login.php");
    }

    public static function studentDestroy() {
        unset($_SESSION['students_mode']);
        header('location: login.php');
    }

    public static function studentSessionCheck() {
        self::init();
        if(self::get("students_mode") == true) {
            header("location: index.php");
        }
    }
}


?>