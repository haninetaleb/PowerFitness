<?php
session_start();

function connectToDB() {
    $mysqli = new mysqli('localhost', 'root', '', 'gym');
    if ($mysqli->connect_errno) {
        die('Failed to connect to MySQL: ' . $mysqli->connect_error);
    }
    return $mysqli;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book'])) {
    $mysqli = connectToDB();

    $FullName = $mysqli->real_escape_string(trim($_POST['FullName']));
    $Email = $mysqli->real_escape_string(trim($_POST['Email']));
    $Date = $mysqli->real_escape_string(trim($_POST['Date']));
    $Time = $mysqli->real_escape_string(trim($_POST['Time']));
    $ClassName = $mysqli->real_escape_string(trim($_POST['ClassName']));

    
    if (empty($FullName) || empty($Email) || empty($Date) || empty($Time) || empty($ClassName)) {
        die('Veuillez remplir tous les champs');
    }
    $currentDate = new DateTime();
    $classDate = DateTime::createFromFormat('Y-m-d', $Date);
    
    if ($classDate < $currentDate) {
        $error = 'Veuillez entrer une date valide. La date de la classe ne peut pas être dans le passé.';
    } else {
        $stmt = $mysqli->prepare("INSERT INTO reservation (FullName, Email, Date, Time, ClassName) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("sssss", $FullName, $Email, $Date, $Time, $ClassName);

        if ($stmt->execute()) {
            header("Location: res.html");
            exit();
        } else {
            $error = 'Error: ' . $stmt->error;
        }

        $stmt->close();
    }
}
include 'res.html';

if (isset($error)) {
    echo '<p id="error">' . $error . '</p>';
}
    
?>
