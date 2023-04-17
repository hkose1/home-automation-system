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
    }else if (is_username_used($username)) {
        $_SESSION['username_taken_error'] = "This username is already taken.";
        header("Location:../signup/signup.php");
        exit();
    }else {
        $is_added = add_user($username, $password, $email, $phone ?? null);
        if ($is_added) {
            $_SESSION['succeessfully_signedup'] = "You have successfully signed up";
            header("Location:../signup/signup.php");
        }else {
            $_SESSION['error'] = "Something went wrong.";
            header("Location:../signup/signup.php");
            exit();
        }
    }
}

if (get('req') == 'login') {
    $username = post('username');
    $password = post('password');
    
    $_SESSION['username'] = $username;

    if (empty($username) || empty($password)) {
        $_SESSION['required_field_error'] = "Please, enter your username and password.";
        header("Location:../login/login.php");
        exit();
    }else {
        $user = get_user($username, $password);
        if ($user) {
            $_SESSION['login'] = true;
            header("Location:../index.php?room_id=1");
            exit();
        }else {
            $_SESSION['no_account_error'] = "There is no such a user";
            header("Location:../login/login.php");
            exit();
        }
    }
}

if (get('req') == 'logout') {
    session_destroy();
    header('Location:../login/login.php');
}

?>