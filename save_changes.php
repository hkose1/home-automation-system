<?php
include './utils/utils.php';
include './db/db_devices.php';

$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);

$room_id = $data['room_id'] ?? null;
$state = $data['state'] ?? null;
$rangeValue = $data['range_value'] ?? null;
$which_device = $data['device'] ?? null;
$mode_value = $data['mode_value'] ?? null;
$delete_device = $data['delete_device'] ?? null;

switch ($which_device) {
    case 'ac':
        if ($delete_device == true) {
            delete_ac_device($room_id);
        } else {
            if (isset($state)) {
                if ($state) {
                    set_ac_device_state($room_id, 1);
                } else {
                    set_ac_device_state($room_id, 0);
                }
            }
            if (isset($rangeValue)) {
                if ($rangeValue) {
                    set_ac_device_value($room_id, $rangeValue);
                } else {
                    set_ac_device_value($room_id, 0);
                }
            }
            if (isset($mode_value)) {
                if ($mode_value) {
                    set_ac_device_mood($room_id, 1);
                } else {
                    set_ac_device_mood($room_id, 0);
                }
            }
        }
        break;
    case 'tv':
        if (isset($state)) {
            if ($state) {
                set_tv_device_state($room_id, 1);
            } else {
                set_tv_device_state($room_id, 0);
            }
        }
        break;
    case 'audio':
        if (isset($state)) {
            if ($state) {
                set_audio_device_state($room_id, 1);
            } else {
                set_audio_device_state($room_id, 0);
            }
        }
        if (isset($rangeValue)) {
            if ($rangeValue) {
                set_audio_device_value($room_id, $rangeValue);
            } else {
                set_audio_device_value($room_id, 0);
            }
        }
        break;
    case 'window':
        if (isset($state)) {
            if ($state) {
                set_window_device_state($room_id, 1);
            } else {
                set_window_device_state($room_id, 0);
            }
        }
        break;
    case 'lamp':
        if (isset($state)) {
            if ($state) {
                set_lamp_device_state($room_id, 1);
            } else {
                set_lamp_device_state($room_id, 0);
            }
        }
        break;
    case 'curtain':
        if (isset($state)) {
            if ($state) {
                set_curtain_device_state($room_id, 1);
            } else {
                set_curtain_device_state($room_id, 0);
            }
        }
        break;
}