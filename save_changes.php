<?php
include './utils/utils.php';
include './db/db_devices.php';

$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);

$room_id = $data['room_id'];
$state = $data['state'];
$rangeValue = $data['range_value'];
$which_device = $data['device'];


$final_state = 0;
if (isset($state) && !empty($state) && $state != false) {
    $final_state = 1;
}

switch ($which_device) {
    case 'ac':
        set_ac_device_state($room_id, $final_state);
        if ($rangeValue) set_ac_device_value($room_id, $rangeValue);
        break;
    case 'tv':
        set_tv_device_state($room_id, $final_state);
        break;
    case 'audio':
        set_audio_device_state($room_id, $final_state);
        if ($rangeValue) set_audio_device_value($room_id, $rangeValue);
        break;
    case 'window':
        set_window_device_state($room_id, $final_state);
        break;
    case 'lamp':
        set_lamp_device_state($room_id, $final_state);
        break;
    case 'curtain':
        set_curtain_device_state($room_id, $final_state);
        break;
}