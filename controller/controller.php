<?php 

session_start();

include "../utils/utils.php";
include "../db/db_connection.php";

if (get('req') == 'signup') {
    $username = post('username');
    $password = post('password');
    $email = post('email');
    $phone = post('phone');

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;

    if (empty($username) || empty($password) || empty($email)) {
        $_SESSION['required_field_error'] = "* Fields are required.";
        header("Location:../signup/signup.php");
        exit();
    }
}


?>