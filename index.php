<?php

session_start();

include 'db/db_devices.php';
include 'utils/utils.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header('Location:./login/login.php');
}
$windowRobbing = post('room');

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

        .room-title {
            margin-top: 20px;
        }

        li>.card {
            transition: all 0.3s;
        }

        li>.card:hover {
            transform: scale(1.05);
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
                                        <td style="border-right: 1px solid #333" id="temp1">
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
                                        <td style="border-right: 1px solid #333" id="temp2">
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
                                        <td style="border-right: 1px solid #333" id="temp3">
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
                                        <td style="border-right: 1px solid #333" id="temp4">
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
                    <li style="margin-left: auto; margin-right: 15px;">
                        <a href="./producer/producer.html" class="btn btn-success" style="border-radius: 7px;">Producer Animations</a>
                    </li>
                    <li>
                        <a href="./controller/controller.php?req=logout" class="btn btn-success logout " style="border-radius: 7px;">Log out</a>
                    </li>
                </ul>
            </div>
            <div id=<?= get('room_id') ?> class="d-flex justify-content-center room-title">
                <h3>
                    <?php $id = get('room_id');
                    switch ($id) {
                        case 1:
                            echo "Living Room";
                            break;
                        case 2:
                            echo "Bedroom";
                            break;
                        case 3:
                            echo "Bathroom";
                            break;
                        case 4:
                            echo "Kitchen";
                            break;
                    } ?>
                </h3>
                <div class="btn-group dropright d-flex" style="margin-left: 2%;">
                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <strong>Add Device</strong> 
                    </button>
                    <div class="dropdown-menu" id="dropdown-add-device-menu">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around flex-wrap">
                <?php $device = get_device(get('room_id'), 'ac');
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch d-flex">
                                <input class="form-check-input" type="checkbox" role="switch" id="ac-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="ac-toggle">Air Conditioner</label>
                                <div class="btn-group dropleft d-flex" style="margin-left: auto;">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" name="ac" type="button" id="ac-delete">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <img src="./assets/image/devices/air-conditioner.avif" class="card-image-top device-icon" alt="air-conditioner" />
                            <div style="margin: 4px 0px">
                                <label for="ac-radio-heat">Heat</label>
                                <input type="radio" name="ac-mode-radio" id="ac-radio-heat" value="heat" style="margin-right: 15px;" <?= $device['mode'] ? 'checked' : '' ?>>

                                <label for="ac-radio-cool">Cool</label>
                                <input type="radio" name="ac-mode-radio" id="ac-radio-cool" value="cool" <?= $device['mode'] ? '' : 'checked' ?>>
                            </div>
                            <div>
                                <input type="range" name="ac-range" id="ac-range" value=<?= $device['value'] ?>>
                                <span>Value: <output id="ac-value"></output></span>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php $device = get_device(get('room_id'), 'tv');
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch d-flex">
                                <input class="form-check-input" type="checkbox" role="switch" id="tv-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="tv-toggle">Television</label>
                                <div class="btn-group dropleft d-flex" style="margin-left: auto;">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" name="tv" type="button" id="tv-delete">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <img src="./assets/image/devices/television.avif" class="card-image-top device-icon" alt="television" />
                        </div>
                    </div>
                <?php endif ?>

                <?php $device = get_device(get('room_id'), 'audio');
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch d-flex">
                                <input class="form-check-input" type="checkbox" role="switch" id="audio-system-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="audio-system-toggle">Audio System</label>
                                <div class="btn-group dropleft d-flex" style="margin-left: auto;">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" name="audio" type="button" id="audio-system-delete">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <img src="./assets/image/devices/audio-system.avif" class="card-image-top device-icon" alt="audio-system" />
                            <div>
                                <input type="range" style="margin-top: 10px;" name="audio-range" id="audio-range" value=<?= $device['value'] ?>>
                                <span>Value: <output id="audio-value"></output></span>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php $device = get_device(get('room_id'), 'window');
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;" <?php if ($windowRobbing) {
                                                                        echo 'id="window"';
                                                                    } ?>>
                        <div class="card-header">
                            <div class="form-check form-switch d-flex">
                                <input class="form-check-input" type="checkbox" role="switch" id="window-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="window-toggle">Windows</label>
                                <div class="btn-group dropleft d-flex" style="margin-left: auto;">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" name="window" type="button" id="window-delete">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <img src="./assets/image/devices/window.avif" class="card-image-top device-icon" alt="windows" />
                        </div>
                    </div>
                <?php endif ?>

                <?php $device = get_device(get('room_id'), 'lamp');
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch d-flex">
                                <input class="form-check-input" type="checkbox" role="switch" id="lamp-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="lamp-toggle">Lamp</label>
                                <div class="btn-group dropleft d-flex" style="margin-left: auto;">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" name="lamp" type="button" id="lamp-delete">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center flex-column">
                            <?php if ($device['state']) : ?>
                                <img src="./assets/image/devices/lamp-on.avif" class="card-image-top device-icon" alt="lamp" id="lamp-icon" />
                            <?php else : ?>
                                <img src="./assets/image/devices/lamp-off.avif" class="card-image-top device-icon" alt="lamp" id="lamp-icon" />
                            <?php endif ?>
                        </div>
                    </div>
                <?php endif ?>

                <?php $device = get_device(get('room_id'), 'curtain');
                if ($device) :  ?>
                    <div class="card my-card" style="width: 23rem;">
                        <div class="card-header">
                            <div class="form-check form-switch d-flex">
                                <input class="form-check-input" type="checkbox" role="switch" id="curtain-toggle" <?= $device['state'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="curtain-toggle">Curtain</label>
                                <div class="btn-group dropleft d-flex" style="margin-left: auto;">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" name="curtain" type="button" id="curtain-delete">Delete</button>
                                    </div>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="producer/producer.js"></script>
</body>

</html>