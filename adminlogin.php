<?php
session_start();

$adminEmail = 'admin@gmail.com';
$adminPassword = 'admin123';  

function connectToDB() {
    $mysqli = new mysqli('localhost', 'root', '', 'gym');
    if ($mysqli->connect_errno) {
        die('Failed to connect to MySQL: ' . $mysqli->connect_error);
    }
    return $mysqli;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $mysqli = connectToDB();

    
    $Email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_EMAIL);
    $Password = trim($_POST['Password']);

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format');
    }

    if ($Email === $adminEmail && $Password === $adminPassword) {
        
        $_SESSION['MemberID'] = -1;  
        $_SESSION['Email'] = $adminEmail;
        $_SESSION['isAdmin'] = true;

        header("Location: admin_panel.php");
        exit();
    } else {
        
        $stmt = $mysqli->prepare("SELECT MemberID, Email, Password FROM members WHERE Email = ?");
        if (!$stmt) {
            die('Prepare failed: ' . $mysqli->error);
        }
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($MemberID, $EmailFromDB, $stored_password);
            $stmt->fetch();

          
            if ($Password === $stored_password) {
                $_SESSION['MemberID'] = $MemberID;
                $_SESSION['Email'] = $EmailFromDB;
                $_SESSION['isAdmin'] = false;

                header("Location: home.html");
                exit();
            } else {
                die('Invalid email or password');
            }
        } else {
            die('Invalid email or password');
        }

        $stmt->close();
    }

    $mysqli->close();
}
?>


