<?php 

try {
    $db = new PDO("mysql:host=localhost;dbname=home_automation_system", 'root', 'admin');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception $e) {
    echo $e->getMessage();
}

function add_user($username, $pass, $email, $phone) {
    if (is_username_used($username)) {
        return false;
    } else {
        global $db;
        $q = $db->prepare("INSERT INTO user SET username = ?, password = ?, email = ?, phone_no = ?");
        $is_added = $q->execute([$username, md5($pass), $email, $phone]);
        if ($is_added) {
            return $q->rowCount() > 0;
        }else {
            throw new Exception("An error has occured while signing.");
        }
    }
}

function get_user($username, $pass) {
    global $db;
    $q = $db->prepare('SELECT * FROM user WHERE username = ? AND password = ?');
    $user = $q->execute([$username, md5($pass)]);
    if ($user) {
        return $q->rowCount() > 0;
    }else {
        throw new Exception("An error has occured while getting user");
    }
}

function is_username_used($username) {
    global $db;
    $users = $db->prepare('SELECT * FROM user WHERE username = ?');
    $res = $users->execute([$username]);
    if ($res) {
        return $users->rowCount() > 0;
    }else {
        throw new Exception("An error has occured while checking usernames in db");
    }
}

?>