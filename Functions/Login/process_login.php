<?php
session_start();
require_once ('../Database/Database.php');

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

            header('Location: ../Admin/adminPage.php');
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "User not found.";
    }
} else {
    $error = "Invalid request.";
}

if (!empty($error)) {
    echo "<p style='color:red;'>$error</p>";
}

$dbManager->close();
?>
