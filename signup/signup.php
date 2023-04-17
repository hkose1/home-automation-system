<?php 

session_start();
include '../utils/utils.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Sign Up</title>
    <style>
        body {
            background: #527a7a;
        }
        .card-bg {
            background: #c2f0f0;
        }
    </style>
</head>
<body>
    <main class="container d-flex align-items-center justify-content-center" style="margin-top: 7rem;">
        <div class="card card-bg" style="width: 30rem;">
            <div class="card-header">
                <strong>Sign up</strong>
            </div>

            <div class="card-body">

            <?php if(session('error')): ?>
                <div class="alert alert-danger"><?= session('error') ?></div>

            <?php elseif(session('required_field_error')): ?>
                <div class="alert alert-danger"><?= session('required_field_error') ?></div>

            <?php elseif(session('username_taken_error')): ?>
                <div class="alert alert-danger"><?= session('username_taken_error') ?></div>

            <?php elseif(session('succeessfully_signedup')): ?>
                <div class="alert alert-success"><?= session('succeessfully_signedup') ?></div>
            <?php endif ?>
        
        
            <form action="../controller/controller.php?req=signup" method="post">
                
                <label for="username" class="col-sm-3 col-form-label">Username<span style="color:red"> *</span></label>
                <div class="col-sm-9">
                    <input type="text" name="username" id="username" 
                        class="form-control"
                        value="<?= session('username') ?>" placeholder="username">
                </div>

                <label for="password" class="col-sm-3 col-form-label">Password<span style="color:red"> *</span></label>
                <div class="col-sm-9">
                    <input type="password" name="password" id="password"
                        class="form-control"
                        placeholder="********">
                </div>


                <label for="email" class="col-sm-3 col-form-label">Email<span style="color:red"> *</span></label>
                <div class="col-sm-9">
                    <input type="email" name="email" id="email" value="<?= session('email') ?>" 
                        class="form-control"
                        placeholder="example@gmail.com">
                </div>


                <label for="phone" class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-9">
                    <input type="tel" name="phone" id="phone" 
                        pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                        class="form-control"
                        placeholder="xxx-xxx-xxxx"
                        value="<?= session('phone') ?>">
                </div>
                <div style="display: flex; justify-content:flex-start; align-items: center">
                    <button type="submit" class="btn btn-success mb-4" style="margin: 23px 5px">Sign up</button>
                    <a href="../login/login.php" class="btn btn-primary">Log in</a>
                </div>
            </form>
            </div>
        </div>
    </main>
</body>
</html>
<?php 
    $_SESSION['error'] = null;
    $_SESSION['required_field_error'] = null;
    $_SESSION['username_taken_error'] = null;
    $_SESSION['succeessfully_signedup'] = null;
    $_SESSION['username'] = null;
    $_SESSION['email'] = null;
    $_SESSION['phone'] = null;
?>