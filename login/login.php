<?php 

session_start();
include '../utils/utils.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="signup.css">
    <title>Log in</title>
</head>
<body>
    <main>

        <?php if(session('required_field_error')): ?>
            <div><?= session('required_field_error') ?></div>

        <?php elseif(session('no_account_error')): ?>
            <div?><?= session('no_account_error') ?></div>
        <?php endif ?>
        
        
        <form action="../controller/controller.php?req=login" method="post">
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username" value="<?= session('username') ?>" placeholder="username"><br><br>

            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" placeholder="********"><br><br>

            <button type="submit">Log in</button><br><br>
        </form>
    </main>
</body>
</html>
<?php 
    $_SESSION['no_account_error'] = null;
    $_SESSION['required_field_error'] = null;
    $_SESSION['username'] = null;
?>