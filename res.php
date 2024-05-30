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

   $currentDate = new DateTime();
    $classDate = DateTime::createFromFormat('Y-m-d', $Date);
    if ($classDate < $currentDate) {
        $error = 'Veuillez entrer une date valide. La date de la classe ne peut pas être dans le passé.';
        header("Location: res.html?error=" . urlencode($error));
        exit();
    }

    $stmt = $mysqli->prepare("INSERT INTO reservation (FullName, Email, Date, Time, ClassName) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $FullName, $Email, $Date, $Time, $ClassName);

    if ($stmt->execute()) {
        header("Location: res.html?success=1");
        exit();
    } else {
        $error = 'Error: ' . $stmt->error;
        header("Location: res.html?error=" . urlencode($error));
        exit();
    }

        $stmt->close();
        $mysqli->close();
    }

?>
