<?php

// create a connection with the tablebase
$timezone = date_default_timezone_set("Africa/Lagos");

// error reporting and logging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// create a new database connection
try {
    //$con = new mysqli("localhost", "exceljet_fredrick", "lautech@1991", "exceljet_app");
    $con = new mysqli("localhost", "root", "", "exceljet_app");
    $con->set_charset("utf8mb4");
} catch (Exception $e) {
    error_log($e->getMessage());
    die("connection to the database failed ");
}


// set up all the varaiables and remove tags
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$birthdate = strip_tags($_POST['birthdate']);
$phone = $_POST['phone'];
$country = strip_tags($_POST['country']);
$depositor = strip_tags($_POST['depositor']);
$account_number = $_POST['account_number'];
$gender = strip_tags($_POST['gender']);
$course = strip_tags($_POST['course']);
$marry = strip_tags($_POST['marry']);
$payment = strip_tags($_POST['payment']);
$bank = strip_tags($_POST['bank']);

$stmt = $con->prepare("INSERT INTO clients VALUES('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
$stmt->bind_param("ssssssssssss", $name, $email, $birthdate, $phone, $country, $depositor, $account_number, $gender, $course, $marry, $payment, $bank);
$stmt->execute();

echo ($stmt->affected_rows === 0 ? false : true);
