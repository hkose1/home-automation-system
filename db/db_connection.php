<?php 

try {
    $db = new PDO("mysql:host=localhost;dbname=home_automation_system", 'root', 'admin');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception $e) {
    echo $e->getMessage();
}

?>