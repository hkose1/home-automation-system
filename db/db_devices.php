<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=home_automation_system", 'root', 'admin');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
}


// room: set temperature
function set_temperature($room_id, $temperature)
{
    global $db;
    $q = $db->prepare("UPDATE room SET temperature = ? WHERE id = ?");
    $q->execute([$temperature, $room_id]);
}

// room: to get temperature and humidity
function get_temperature_and_humidity($room_id)
{
    global $db;
    $q = $db->prepare("SELECT * FROM room WHERE id = ?");
    $device = $q->execute([$room_id]);
    if ($device) {
        if ($q->rowCount()) {
            return $q->fetch(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
}


// crud operations on devices
function get_device($room_id, $table_name)
{
    global $db;
    $q = $db->prepare("SELECT * FROM device_" . $table_name . " WHERE room_id = ?");
    $device = $q->execute([$room_id]);
    if ($device) {
        if ($q->rowCount()) {
            return $q->fetch(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
}

function add_device($id, $table_name)
{
    global $db;
    // $q = $db->prepare("SELECT * FROM device_" . $table_name);
    // $q->execute();
    // $new_device_id = $q->rowCount() + 1;
    $new_device_id = uniqid(mt_rand(), true);
    $new_device_id = str_replace(".", "", $new_device_id);
    $new_device_id = intval($new_device_id);
    $new_device_id = $new_device_id % (9000);
    $new_device_id += 1000;

    if ($table_name == 'ac') {
        $q = $db->prepare("INSERT INTO device_ac VALUES(?,?,?,?,?)");
        $q->execute([$new_device_id, $id, 0, 0, 0]);
    } else if ($table_name == 'audio') {
        $q = $db->prepare("INSERT INTO device_audio VALUES(?,?,?,?)");
        $q->execute([$new_device_id, $id, 0, 0]);
    } else {
        $q = $db->prepare("INSERT INTO device_" . $table_name . " VALUES(?,?,?)");
        $q->execute([$new_device_id, $id, 0]);
    }
}

function delete_device($id, $table_name)
{
    global $db;
    $q = $db->prepare("DELETE FROM device_" . $table_name . " WHERE room_id = ?");
    $q->execute([$id]);
}


// air condition 
function set_ac_device_state($id, $state)
{
    global $db;
    $q = $db->prepare("UPDATE device_ac SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
}
function set_ac_device_value($id, $value)
{
    global $db;
    $q = $db->prepare("UPDATE device_ac SET value = ? WHERE room_id = ?");
    $q->execute([$value, $id]);
}

function set_ac_device_mood($id, $mode_value)
{
    global $db;
    $q = $db->prepare("UPDATE device_ac SET mode = ? WHERE room_id = ?");
    $q->execute([$mode_value, $id]);
}


// television
function set_tv_device_state($id, $state)
{
    global $db;
    $q = $db->prepare("UPDATE device_tv SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
}

// audio system
function add_audio_device($id)
{
}
function set_audio_device_state($id, $state)
{
    global $db;
    $q = $db->prepare("UPDATE device_audio SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
}
function set_audio_device_value($id, $value)
{
    global $db;
    $q = $db->prepare("UPDATE device_audio SET value = ? WHERE room_id = ?");
    $q->execute([$value, $id]);
}

// window
function set_window_device_state($id, $state)
{
    global $db;
    $q = $db->prepare("UPDATE device_window SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
}

// lamp
function set_lamp_device_state($id, $state)
{
    global $db;
    $q = $db->prepare("UPDATE device_lamp SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
}
// curtain
function set_curtain_device_state($id, $state)
{
    global $db;
    $q = $db->prepare("UPDATE device_curtain SET state = ? WHERE room_id = ?");
    $q->execute([$state, $id]);
}
