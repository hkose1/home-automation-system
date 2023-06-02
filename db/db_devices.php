<?php 

try {
    $db = new PDO("mysql:host=localhost;dbname=home_automation_system", 'root', 'admin');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception $e) {
    echo $e->getMessage();
}


// room: set temperature
function set_temperature($room_id, $temperature) {
    global $db;
    $q = $db->prepare("UPDATE room SET temperature = ? WHERE id = ?");
    $q->execute([$temperature, $room_id]);
}

// room: to get temperature and humidity
function get_temperature_and_humidity($room_id) {
    global $db;
    $q = $db->prepare("SELECT * FROM room WHERE id = ?");
    $device = $q->execute([$room_id]);
    if($device) {
        if ($q->rowCount()) {
            return $q->fetch(PDO::FETCH_ASSOC);
        }else {
            return [];
        }
    }
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
    $q = $db->prepare("UPDATE device_ac SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
}
function set_ac_device_value($id, $value) {
    global $db;
    $q = $db->prepare("UPDATE device_ac SET value = ? WHERE room_id = ?");
    $q->execute([$value, $id]);
}

function set_ac_device_mood($id, $mode_value) {
    global $db;
    $q = $db->prepare("UPDATE device_ac SET mode = ? WHERE room_id = ?");
    $q->execute([$mode_value, $id]);
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
function set_tv_device_state($id, $state) {
    global $db;
    $q = $db->prepare("UPDATE device_tv SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
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
function set_audio_device_state($id, $state) {
    global $db;
    $q = $db->prepare("UPDATE device_audio SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
}
function set_audio_device_value($id, $value) {
    global $db;
    $q = $db->prepare("UPDATE device_audio SET value = ? WHERE room_id = ?");
    $q->execute([$value, $id]);
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
function set_window_device_state($id, $state) {
    global $db;
    $q = $db->prepare("UPDATE device_window SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
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

function set_lamp_device_state($id, $state) {
    global $db;
    $q = $db->prepare("UPDATE device_lamp SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
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
function set_curtain_device_state($id, $state) {
    global $db;
    $q = $db->prepare("UPDATE device_curtain SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
}
?>