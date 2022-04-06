<?php
// Set up the database connection
$dsn = 'pgsql:host=ec2-34-207-12-160.compute-1.amazonaws.com;dbname=ddvh7as1328tlc';
$username =  'knjxznfeftubxq';// //'mgs_user';
$password =  'ff0f4387a3b114364673fdbcdc49a616b6fd2b54ba97b3ad4438437c0c106396';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('errors/db_error_connect.php');
    exit();
}
?>