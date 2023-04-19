<?php

session_start();

include 'db/db_devices.php';
include 'utils/utils.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header('Location:./login/login.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
    <style>
        body {
            background: #e0ebeb;
        }

        #side-nav {
            background: #d1e0e0;
            min-width: 300px;
            max-width: 300px;
        }

        .content {
            min-height: 100vh;
            width: 100%;
        }

        .my-card {
            margin: 15px 15px;
            border-radius: 7px;
        }

        .content ul {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .logout {
            margin-right: 15px;
        }

        .table th td {
            margin-right: 4px;
        }

        .device-icon {
            width: 10rem;
        }
    </style>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side-nav">
            <div class="header-box px-2 pt-3 pb-4">
                <h1 class="fs-4"><span class="text-dark" style="margin-left: 15px;">Parts of the house</span></h1>
                <hr>
            </div>
            <ul class="list-unstyled px-2">
                <li id="living-room">
                    <div class="card my-card">
                        <img src="./assets/image/rooms/living-room.avif" class="card-image-top" alt="living-room" />
                        <div class="card-body">
                            <h5 class="card-title">Living Room</h5>
                            <table class="table">
                                <tr>
                                    <th>TEMPERATURE</th>
                                    <th>HUMIDITY</th>
                                </tr>
                                <tr>
                                    <?php $room_info = get_temperature_and_humidity(1);
                                    if ($room_info) : ?>
                                        <td style="border-right: 1px solid #333">
                                            <?= $room_info['temperature'] ?>&#8451
                                        </td>
                                        <td>
                                            <?= $room_info['humidity'] ?>%
                                        </td>
                                    <?php endif ?>
                                </tr>
                            </table>
                            <a href="index.php?room_id=1" class="btn btn-info">Details</a>
                        </div>
                    </div>
                </li>
                <li id="bedroom">
                    <div class="card my-card">
                        <img src="./assets/image/rooms/bedroom.avif" class="card-image-top" alt="bedroom" />
                        <div class="card-body">
                            <h5 class="card-title">Bedroom</h5>
                            <table class="table">
                                <tr>
                                    <th>TEMPERATURE</th>
                                    <th>HUMIDITY</th>
                                </tr>
                                <tr>
                                    <?php $room_info = get_temperature_and_humidity(2);
                                    if ($room_info) : ?>
                                        <td style="border-right: 1px solid #333">
                                            <?= $room_info['temperature'] ?>&#8451
                                        </td>
                                        <td>
                                            <?= $room_info['humidity'] ?>%
                                        </td>
                                    <?php endif ?>
                                </tr>
                            </table>
                            <a href="index.php?room_id=2" class="btn btn-info">Details</a>
                        </div>
                    </div>
                </li>
                <li id="bathroom">
                    <div class="card my-card">
                        <img src="./assets/image/rooms/bathroom.avif" class="card-image-top" alt="bathroom" />
                        <div class="card-body">
                            <h5 class="card-title">Bathroom</h5>
                            <table class="table">
                                <tr>
                                    <th>TEMPERATURE</th>
                                    <th>HUMIDITY</th>
                                </tr>
                                <tr>
                                    <?php $room_info = get_temperature_and_humidity(3);
                                    if ($room_info) : ?>
                                        <td style="border-right: 1px solid #333">
                                            <?= $room_info['temperature'] ?>&#8451
                                        </td>
                                        <td>
                                            <?= $room_info['humidity'] ?>%
                                        </td>
                                    <?php endif ?>
                                </tr>
                            </table>
                            <a href="index.php?room_id=3" class="btn btn-info">Details</a>
                        </div>
                    </div>
                </li>
                <li id="kitchen">
                    <div class="card my-card">
                        <img src="./assets/image/rooms/kitchen.avif" class="card-image-top" alt="kitchen" />
                        <div class="card-body">
                            <h5 class="card-title">Kitchen</h5>
                            <table class="table">
                                <tr>
                                    <th>TEMPERATURE</th>
                                    <th>HUMIDITY</th>
                                </tr>
                                <tr>
                                    <?php $room_info = get_temperature_and_humidity(4);
                                    if ($room_info) : ?>
                                        <td style="border-right: 1px solid #333">
                                            <?= $room_info['temperature'] ?>&#8451
                                        </td>
                                        <td>
                                            <?= $room_info['humidity'] ?>%
                                        </td>
                                    <?php endif ?>
                                </tr>
                            </table>
                            <a href="index.php?room_id=4" class="btn btn-info">Details</a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
        <div class="content">
            <div class="navbar navbar-light bg-light">
                <ul class="d-flex list-unstyled justify-content-between align-items-center">
                    <li>
                        <h2 style="margin-left: 15px; margin-right: 15px;">Home Automation System</h2>
                    </li>
                    <li>
                        <a href="./controller/controller.php?req=logout" class="btn btn-success logout">Log out</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex justify-content-around flex-wrap">
                <?php $device = get_ac_device(get('room_id'));
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="ac-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="ac-toggle">Air Conditioner</label>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <img src="./assets/image/devices/air-conditioner.avif" class="card-image-top device-icon" alt="air-conditioner" />
                            <div>
                                <input type="range" name="ac-range" id="ac-range">
                                <span>Value: <output id="ac-value"><?= $device['value'] ?></output></span>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php $device = get_tv_device(get('room_id'));
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="tv-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="tv">Television</label>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <img src="./assets/image/devices/television.avif" class="card-image-top device-icon" alt="television" />
                        </div>
                    </div>
                <?php endif ?>

                <?php $device = get_audio_system_device(get('room_id'));
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="audio-system-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="audio-system">Audio System</label>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <img src="./assets/image/devices/audio-system.avif" class="card-image-top device-icon" alt="audio-system" />
                            <div>
                                <input type="range" name="audio-range" id="audio-range">
                                <span>Value: <output id="audio-value"><?= $device['value'] ?></output></span>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php $device = get_window_device(get('room_id'));
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="window-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="window">Windows</label>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <img src="./assets/image/devices/window.avif" class="card-image-top device-icon" alt="windows" />
                        </div>
                    </div>
                <?php endif ?>

                <?php $device = get_lamp_device(get('room_id'));
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="lamp-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="lamp">Lamp</label>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <?php if($device['state']): ?>
                                <img src="./assets/image/devices/lamp-on.avif" class="card-image-top device-icon" alt="lamp" id="lamp-icon" />
                            <?php else: ?>
                                <img src="./assets/image/devices/lamp-off.avif" class="card-image-top device-icon" alt="lamp" id="lamp-icon" />
                            <?php endif?>
                        </div>
                    </div>
                <?php endif ?>

                <?php $device = get_curtain_device(get('room_id'));
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="curtain-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="curtain">Curtain</label>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <img src="./assets/image/devices/curtain.avif" class="card-image-top device-icon" alt="curtain" />
                        </div>
                    </div>
                <?php endif ?>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>

</html>