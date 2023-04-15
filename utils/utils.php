<?php 

function get($get) {
    if(isset($_GET[$get])) {
        return htmlspecialchars(trim($_GET[$get]));
    }else {
        return false;
    }
}

function post($post) {
    if(isset($_POST[$post])) {
        return htmlspecialchars(trim($_POST[$post]));
    }else {
        return false;
    }
}

function session($session) {
    if(isset($_SESSION[$session])) {
        return htmlspecialchars(trim($_SESSION[$session]));
    }else {
        return false;
    }
}

?>