<?php
session_start();

include '../db/db_devices.php';

$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);

$room_id = $data['room_id'] ?? null;
$temperature_value = $data['temperature_value'] ?? null;

if (isset($temperature_value)) {
    set_temperature($room_id, $temperature_value);
}
?>