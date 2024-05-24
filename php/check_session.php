<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

header('Content-Type: application/json');

$response = array('logged_in' => false);

if (isset($_SESSION['user_id'])) {
    $response['logged_in'] = true;
}

echo json_encode($response);
?>
