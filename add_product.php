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

    $ProductName = trim($_POST['Product_name']);
    $ProductDescription = trim($_POST['Product_description']);
    $ProductPrice = trim($_POST['Price']);
    $ProductImage = $_FILES['Product_image'];

    if (empty($ProductName) || empty($ProductDescription) || empty($ProductPrice) || empty($ProductImage['name'])) {
        die('All fields are required.');
    }

    if ($ProductImage['error'] !== UPLOAD_ERR_OK) {
        die('Error uploading file.');
    }

    $targetDir = "Assets/";

    $targetFileName = uniqid() . '_' . basename($ProductImage['name']);

    $targetFilePath = $targetDir . $targetFileName;

    if (!move_uploaded_file($ProductImage['tmp_name'], $targetFilePath)) {
        die('Error moving uploaded file.');
    }

    $stmt = $mysqli->prepare("INSERT INTO product (Product_name, Product_description, Price, Product_image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $ProductName, $ProductDescription, $ProductPrice, $targetFilePath);

    if ($stmt->execute()) {
        echo 'Product added successfully.';
    } else {
        die('Error: ' . $stmt->error);
    }

    $stmt->close();
    $mysqli->close();
}
?>

