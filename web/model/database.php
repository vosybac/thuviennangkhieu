<?php
// Set up the database connection
$dsn = 'pgsql:host=ec2-52-3-60-53.compute-1.amazonaws.com;dbname=d7d80jq8ebi2v6';
$username =  'kuzxoacduwdksq';// //'mgs_user';
$password =  '20df762c01f44ceb2f7de923ef7b85397ff71d72462af87a1f7a4c8eac21caa8';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('errors/db_error_connect.php');
    exit();
}
?>