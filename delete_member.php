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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = connectToDB();

    $MemberID = intval($_POST['MemberID']);

    $stmt = $mysqli->prepare("DELETE FROM members WHERE MemberID = ?");
    $stmt->bind_param("i", $MemberID);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo 'Member deleted successfully.';
        } else {
            echo 'Member not found, please enter an existant ID number.';
        }
    } else {
        die('Error: ' . $stmt->error);
    }

    $stmt->close();
    $mysqli->close();
}
?>
