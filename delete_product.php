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

    $ProductID = intval(trim($_POST['Product_ref']));

    if (empty($ProductID)) {
        die('Product ID is required.');
    }

    $stmt = $mysqli->prepare("DELETE FROM product WHERE Product_ref = ?");
    $stmt->bind_param("i", $ProductID);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo 'Product deleted successfully.';
        } else {
            echo 'Product not found, please enter a valid reference.';
        }
    } else {
        die('Error: ' . $stmt->error);
    }

    $stmt->close();
    $mysqli->close();
}
?>
