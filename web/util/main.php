<?php
// Get the document root
$doc_root = filter_input('https://bac-gsnapwebsite.herokuapp.com/', 'DOCUMENT_ROOT', 'web');

// Get the application path
$uri = filter_input('https://bac-gsnapwebsite.herokuapp.com/', 'REQUEST_URI', 'web');
$dirs = explode('/', $uri);
$app_path = '/' . $dirs[1] . '/' . $dirs[2] . '/';

echo "Application path:";
echo $app_path;

// Set the include path
set_include_path($doc_root . $app_path);

// Get common code
require_once('util/tags.php');
require_once('model/database.php');

// Define some common functions
function display_db_error($error_message) {
    global $app_path;
    include 'errors/db_error.php';
    exit;
}

function display_error($error_message) {
    global $app_path;
    include 'errors/error.php';
    exit;
}

function redirect($url) {
    session_write_close();
    header("Location: " . $url);
    exit;
}

// Start session to store user and cart data
session_start();
?>
