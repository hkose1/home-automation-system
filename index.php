<?php 

session_start();

include "./utils/utils.php";

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header('Location:./login/login.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
    <style>
        body {
            background: #eee;
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
        
    </style>
</head>
<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side-nav">
            <div class="header-box px-2 pt-3 pb-4">
            <h1 class="fs-4"><span class="text-dark">Parts of the house</span></h1>
            <button class="btn d-md-none d-block close-btn px-1 py-0 text-dark"><i class="fa-solid fa-bars fa-xl"></i></button>
            </div>
            <ul class="list-unstyled px-2">
                <li  id="living-room">
                    <div class="card my-card">
                        <img src="./image/living-room.avif" class="card-image-top" alt="living-room"/>
                        <div class="card-body">
                            <h5 class="card-title">Living Room</h5>
                            <table class="table">
                                <tr>
                                    <th>TEMPERATURE</th>
                                    <th>HUMIDITY</th>
                                </tr>
                                <tr>
                                    <td style="border-right: 1px solid #333">25&#8451</td>
                                    <td> 08%</td>
                                </tr>
                            </table>
                            <a href="#" class="btn btn-info">Details</a>    
                        </div>
                    </div>
                </li>
                <li id="bedroom">
                    <div class="card my-card">
                        <img src="./image/bedroom.avif" class="card-image-top" alt="living-room"/>
                        <div class="card-body">
                            <h5 class="card-title">Bedroom</h5>
                            <table class="table">
                                <tr>
                                    <th>TEMPERATURE</th>
                                    <th>HUMIDITY</th>
                                </tr>
                                <tr>
                                    <td style="border-right: 1px solid #333">25&#8451</td>
                                    <td> 08%</td>
                                </tr>
                            </table>
                            <a href="#" class="btn btn-info">Details</a>
                        </div>
                    </div>
                </li>
                <li id="bathroom">
                    <div class="card my-card">
                        <img src="./image/bathroom.avif" class="card-image-top" alt="living-room"/>
                        <div class="card-body">
                            <h5 class="card-title">Bathroom</h5>
                            <table class="table">
                                <tr>
                                    <th>TEMPERATURE</th>
                                    <th>HUMIDITY</th>
                                </tr>
                                <tr>
                                    <td style="border-right: 1px solid #333">25&#8451</td>
                                    <td> 08%</td>
                                </tr>
                            </table>
                            <a href="#" class="btn btn-info">Details</a>
                        </div>
                    </div>
                </li>
                <li id="kitchen">
                    <div class="card my-card">
                        <img src="./image/kitchen.avif" class="card-image-top" alt="living-room"/>
                        <div class="card-body">
                            <h5 class="card-title">Kitchen</h5>
                            <table class="table">
                                <tr>
                                    <th>TEMPERATURE</th>
                                    <th>HUMIDITY</th>
                                </tr>
                                <tr>
                                    <td style="border-right: 1px solid #333">25&#8451</td>
                                    <td> 08%</td>
                                </tr>
                            </table>
                            <a href="#" class="btn btn-info">Details</a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
        <div class="content">
            <div class="navbar navbar-light bg-light">    
                <ul class="d-flex list-unstyled justify-content-between align-items-center">
                    <li>
                        <h1 style="margin-left: 15px; margin-right: 15px;">Home Automation System</h1>
                    </li>
                    <li>
                        <a href="./controller/controller.php?req=logout" class="btn btn-outline-success logout">Log out</a>
                    </li>
                </ul>
            </div>
            <!-- adfs -->
        </div>
    </div>
    <script>

    </script>
</body>
</html>