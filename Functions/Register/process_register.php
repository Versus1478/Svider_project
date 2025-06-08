<?php
session_start();
require_once ('../Database/Database.php');

$dbManager = new DatabaseManager('localhost', 'root', 'root', 'test');
$conn = $dbManager->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (strlen($username) < 3 || strlen($password) < 4) {
        die("Username or password is too short.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        echo "<p class='message'>Registration successful! <a href='../../index.php'>Go to Home</a></p>";
    } else {
        echo "Registration failed: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$dbManager->close();
?>

