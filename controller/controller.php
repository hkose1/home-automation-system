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
    } else if (!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{4,17}$/', $username)) {
        $_SESSION['username_validation_error'] =
            "Username:
            - Must start with letter\n
            - (5-16) characters\n
            - Letters and numbers only\n";
        header("Location:../signup/signup.php");
        exit();
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
        $_SESSION['password_validation_error'] =
            "Password:
            - Must be a minimum of 8 characters\n
            - Must contain at least 1 number\n
            - Must contain at least one uppercase character\n
            - Must contain at least one lowercase character\n";
        header("Location:../signup/signup.php");
        exit();
    } else {
        $is_added = add_user($username, $password, $email, $phone ?? null);
        if ($is_added) {
            $_SESSION['succeessfully_signedup'] = "You have successfully signed up";
            header("Location:../signup/signup.php");
        } else {
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
    } else {
        $user = get_user($username, $password);
        if ($user) {
            $_SESSION['login'] = true;
            header("Location:../index.php?room_id=1");
            exit();
        } else {
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
