<?php
session_start();

function connectToDB() {
    $mysqli = new mysqli('localhost', 'root', '', 'gym');
    if ($mysqli->connect_errno) {
        die('Failed to connect to MySQL: ' . $mysqli->connect_error);
    }
    return $mysqli;
}

// Sign Up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_message'])) {
    $mysqli = connectToDB();

    $FullName = $_POST['FullName'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];

    $stmt = $mysqli->prepare("INSERT INTO community (FullName, Email, Message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $FullName, $Email, $Message);

    if ($stmt->execute()) {
        header("Location: community.html");
        exit();
    } else {
        die('Error: ' . $stmt->error);
    }

    $stmt->close();
    $mysqli->close();
}
?>