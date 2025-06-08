<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: adminPage.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Access Denied</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8d7da;
            color: #721c24;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }
        .message-box {
            background: #f5c6cb;
            padding: 30px 50px;
            border: 1px solid #f1b0b7;
            border-radius: 8px;
            max-width: 400px;
            box-shadow: 0 0 15px rgba(183, 49, 60, 0.4);
        }
        h1 {
            margin-bottom: 15px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .countdown {
            font-weight: bold;
            font-size: 22px;
            margin-bottom: 20px;
        }
        a.login-button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #721c24;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        a.login-button:hover {
            background-color: #501217;
        }
    </style>
    <script>
        let seconds = 5;
        function updateCountdown() {
            const countdownElem = document.getElementById('countdown');
            countdownElem.textContent = seconds;
            if (seconds === 0) {
                window.location.href = 'login.php';
            } else {
                seconds--;
                setTimeout(updateCountdown, 1000);
            }
        }
        window.onload = updateCountdown;
    </script>
</head>
<body>
<div class="message-box">
    <h1>🚫 Access Denied</h1>
    <p>You do not have permission to access the admin panel.<br>Please log in to continue.</p>
    <div class="countdown">Redirecting in <span id="countdown">5</span> seconds...</div>
    <a href="login.php" class="login-button">Go to Login Now</a>
</div>
</body>
</html>
