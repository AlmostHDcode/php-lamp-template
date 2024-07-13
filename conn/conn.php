<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
date_default_timezone_set('your time zone here'); //set your timezone

$conn = mysqli_connect(getenv("host"),getenv("user"),getenv("pass"),getenv("db"));
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$db = getenv("db");

//Get Client IP Address
if (isset($_SERVER["REMOTE_ADDR"]) ) {
    $getip = $_SERVER["REMOTE_ADDR"];
} else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]) ) {
    $getip = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else if (isset($_SERVER["HTTP_CLIENT_IP"]) ) {
    $getip = $_SERVER["HTTP_CLIENT_IP"];
}

$getbrowser = $_SERVER['HTTP_USER_AGENT'] ?? NULL;
?>