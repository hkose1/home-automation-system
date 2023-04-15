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
    <title>Sign Up</title>
</head>
<body>
    <main>

        <?php if(session('error')): ?>
            <div><?= session('error') ?></div>

        <?php elseif(session('required_field_error')): ?>
            <div><?= session('required_field_error') ?></div>

        <?php elseif(session('username_taken_error')): ?>
            <div><?= session('username_taken_error') ?></div>

        <?php elseif(session('succeessfully_signedup')): ?>
            <div><?= session('succeessfully_signedup') ?></div>
        <?php endif ?>
        
        
        <form action="../controller/controller.php?req=signup" method="post">
            <label for="username">Username</label><span> *</span><br>
            <input type="text" name="username" id="username" value="<?= session('username') ?>" placeholder="username"><br><br>

            <label for="password">Password</label><span> *</span><br>
            <input type="password" name="password" id="password" placeholder="********"><br><br>

            <label for="email">Email</label><span> *</span><br>
            <input type="email" name="email" id="email" value="<?= session('email') ?>" placeholder="example@gmail.com"><br><br>

            <label for="phone">Phone Number</label><br>
            <input type="tel" name="phone" id="phone" 
                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" 
                placeholder="xxx-xxx-xxxx"
                value="<?= session('phone') ?>"><br><br>

            <button type="submit">Sign up</button><br><br>
        </form>
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