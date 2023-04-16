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
    <title>Log in</title>
</head>
<body>
    <main class="container d-flex align-items-center justify-content-center" style="margin-top: 7rem;">
        
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                <strong>Log in</strong>
            </div>

            <div class="card-body">
                <?php if(session('required_field_error')): ?>
                    <div class="alert alert-danger"><?= session('required_field_error') ?></div>

                <?php elseif(session('no_account_error')): ?>
                    <div class="alert alert-danger"><?= session('no_account_error') ?></div>
                <?php endif ?>
                
                <form action="../controller/controller.php?req=login" method="post">
                    <label for="username" class="col-sm-3 col-form-label">Username<span style="color:red"> *</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="username" id="username" value="<?= session('username') ?>"
                        class="form-control"
                        placeholder="username">
                    </div>

                    <label for="password" class="col-sm-3 col-form-label">Password<span style="color:red"> *</span></label>
                    <div class="col-sm-9">
                        <input type="password" name="password" id="password" 
                        class="form-control"
                        placeholder="********">
                    </div>
                    <div style="display: flex; justify-content:flex-start; align-items: center">
                        <button type="submit" class="btn btn-success mb-4" style="margin: 23px 5px">Log in</button>
                        <a href="../signup/signup.php" class="btn btn-primary">Sign up</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
<?php 
    $_SESSION['no_account_error'] = null;
    $_SESSION['required_field_error'] = null;
    $_SESSION['username'] = null;
?>