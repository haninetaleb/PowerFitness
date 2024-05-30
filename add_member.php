<?php
session_start();

if (!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin']) {
    header("Location: login.html");
    exit();
}

function connectToDB() {
    $mysqli = new mysqli('localhost', 'root', '', 'gym');
    if ($mysqli->connect_errno) {
        die('Failed to connect to MySQL: ' . $mysqli->connect_error);
    }
    return $mysqli;
}

function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    return substr(str_shuffle($chars), 0, $length);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = connectToDB();

    
    $FullName = trim($_POST['FullName']);
    $Email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_EMAIL);
    $Phone = trim($_POST['Phone']);
    $BirthDate = trim($_POST['BirthDate']);
    $Password = generatePassword();


    if (empty($FullName) || empty($Email) || empty($Phone) || empty($BirthDate)) {
        die('All fields are required.');
    }

    
    $stmt = $mysqli->prepare("INSERT INTO members (FullName, Email, Password, Phone, BirthDate) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $FullName, $Email, $Password, $Phone, $BirthDate);

    if ($stmt->execute()) {
        echo 'Member added successfully. Generated Password: ' . $Password;
    } else {
        die('Error: ' . $stmt->error);
    }

    $stmt->close();
    $mysqli->close();
}
?>
