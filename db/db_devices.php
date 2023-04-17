<?php 

try {
    $db = new PDO("mysql:host=localhost;dbname=home_automation_system", 'root', 'admin');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception $e) {
    echo $e->getMessage();
}

// air condition 
function get_ac_device($room_id) {
    global $db;
    $q = $db->prepare("SELECT * FROM device_ac WHERE room_id = ?");
    $device = $q->execute([$room_id]);
    if($device) {
        if ($q->rowCount()) {
            return $q->fetch(PDO::FETCH_ASSOC);
        }else {
            return [];
        }
    }
}

function set_ac_device_state($id, $state) {
    global $db;
    $q = $db->prepare("UPDATE device_ac SET state = ? WHERE id = ?");
    $q->execute([$state, $id]);
}
function set_ac_device_value($id, $value) {
    global $db;
    $q = $db->prepare("UPDATE device_ac SET value = ? WHERE id = ?");
    $q->execute([$value, $id]);
}

// television
function get_tv_device($room_id) {
    global $db;
    $q = $db->prepare("SELECT * FROM device_tv WHERE room_id = ?");
    $device = $q->execute([$room_id]);
    if($device) {
        if ($q->rowCount()) {
            return $q->fetch(PDO::FETCH_ASSOC);
        }else {
            return [];
        }
    }
}

// audio system
function get_audio_system_device($room_id) {
    global $db;
    $q = $db->prepare("SELECT * FROM device_audio WHERE room_id = ?");
    $device = $q->execute([$room_id]);
    if($device) {
        if ($q->rowCount()) {
            return $q->fetch(PDO::FETCH_ASSOC);
        }else {
            return [];
        }
    }
}

// window
function get_window_device($room_id) {
    global $db;
    $q = $db->prepare("SELECT * FROM device_window WHERE room_id = ?");
    $device = $q->execute([$room_id]);
    if($device) {
        if ($q->rowCount()) {
            return $q->fetch(PDO::FETCH_ASSOC);
        }else {
            return [];
        }
    }
}

// lamp
function get_lamp_device($room_id) {
    global $db;
    $q = $db->prepare("SELECT * FROM device_lamp WHERE room_id = ?");
    $device = $q->execute([$room_id]);
    if($device) {
        if ($q->rowCount()) {
            return $q->fetch(PDO::FETCH_ASSOC);
        }else {
            return [];
        }
    }
}
// curtain
function get_curtain_device($room_id) {
    global $db;
    $q = $db->prepare("SELECT * FROM device_curtain WHERE room_id = ?");
    $device = $q->execute([$room_id]);
    if($device) {
        if ($q->rowCount()) {
            return $q->fetch(PDO::FETCH_ASSOC);
        }else {
            return [];
        }
    }
}
?>