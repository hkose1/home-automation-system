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
            background: #eee;
        }

        .content {
            min-height: 100vh;
            width: 100%;
        }

        .my-card {
            margin: 15px 15px;
            border-radius: 7px;
        }

        .device-icon {
            width: 10rem;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="card  my-card" style="width: 23rem;">
                <div class="card-header">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="ac">
                        <label class="form-check-label" for="ac">Air Conditioner</label>
                    </div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center flex-column">
                    <img src="./image/devices/air-conditioner.avif" class="card-image-top device-icon" alt="air-conditioner" />
                    <div>
                        <input type="range" name="ac-level" id="ac-level">
                        <span>Value: <output id="ac-value"></output></span>
                    </div>
                </div>
            </div>
            <div class="card my-card" style="width: 23rem;">
                <div class="card-header">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="tv">
                        <label class="form-check-label" for="tv">Television</label>
                    </div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center flex-column">
                    <img src="./image/devices/television.avif" class="card-image-top device-icon" alt="television" />
                </div>
            </div>
            <div class="card my-card" style="width: 23rem;">
                <div class="card-header">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="audio-system">
                        <label class="form-check-label" for="audio-system">Audio System</label>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
            <div class="card my-card" style="width: 23rem;">
                <div class="card-header">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="window">
                        <label class="form-check-label" for="window">Windows</label>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
            <div class="card my-card" style="width: 23rem;">
                <div class="card-header">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="lamp">
                        <label class="form-check-label" for="lamp">Lamp</label>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
            <div class="card my-card" style="width: 23rem;">
                <div class="card-header">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="curtain">
                        <label class="form-check-label" for="curtain">Curtain</label>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>

        </div>
    </div>
    </div>
    <script>
        const value = document.querySelector("#ac-value")
        const input = document.querySelector("#ac-level")
        value.textContent = input.value
        input.addEventListener("input", (event) => {
            value.textContent = event.target.value
        })
    </script>
</body>

</html>