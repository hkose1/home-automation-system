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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Producer</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous">
    </script>
    <script src="producer/producer.js"></script>
</body>

</html>