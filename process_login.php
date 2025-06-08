<?php
session_start();
require_once ('database.php');

$dbManager = new DatabaseManager('localhost', 'root', 'root', 'test');
$conn = $dbManager->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['admin_logged_in'] = true;

            header('Location: adminPage.php');
            exit();
        } else {
            $_SESSION['login_error'] = "Incorrect password.";
        }
    } else {
        $_SESSION['login_error'] = "User not found.";
    }
} else {
    $_SESSION['login_error'] = "Invalid request.";
}

$dbManager->close();

header('Location: login.php');
exit();
