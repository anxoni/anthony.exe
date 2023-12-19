<?php

$email = $_POST['email'];
$email = $_POST['card'];
$email = $_POST['fullname'];
$email = $_POST['contact'];
$email = $_POST['sched'];
$email = $_POST['time'];

//database connection

$conn =  new mysqli('localhost', 'root', '', 'details');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $smt = $conn->prepare("insert into details(email,card,fullname,contact,sched,time)
        values(?, ?, ?, ?, ?, ?)");

    $smt->bind_param("sisiii", $email, $card, $fullname, $contact, $sched, $time);
    $smt->execute();
    $smt->close();
    $conn->close();
}
