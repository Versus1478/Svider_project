<?php
session_start();
require_once('database.php');

$db = new DatabaseManager('localhost', 'root', 'root', 'test');
$conn = $db->getConnection();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$checkStmt->bind_param("s", $username);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    echo "<p style='color:red; font-weight:bold;'>Username already taken. Please choose another one.</p>";
    echo "<a href='register.php' style='display:inline-block; margin-top:10px; text-decoration:none; color:#3498db;'>Go back to registration</a>";
} else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        echo "<p style='color:green; font-weight:bold;'>Registration successful! 🎉</p>";
        echo "<a href='index.php' style='display:inline-block; margin-top:10px; text-decoration:none; color:#2ecc71;'>Go to homepage</a>";
    } else {
        echo "<p style='color:red;'>Something went wrong. Please try again.</p>";
    }

    $stmt->close();
}

$checkStmt->close();
$db->close();
?>
