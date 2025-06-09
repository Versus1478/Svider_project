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
    ?>
    <div style="
        background-color: #ffe6e6;
        color: #c0392b;
        border: 1px solid #e74c3c;
        border-radius: 8px;
        padding: 20px;
        margin: 30px auto;
        width: 100%;
        max-width: 500px;
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-shadow: 0 4px 12px rgba(231, 76, 60, 0.2);
    ">
        <h3 style="margin-bottom: 10px;">🚫 Username already taken</h3>
        <p>Please choose another username. It seems that this one is already in use.</p>
        <a href="register.php" style="
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: background 0.3s ease;
        " onmouseover="this.style.background='#c0392b'" onmouseout="this.style.background='#e74c3c'">
            🔄 Try Again
        </a>
    </div>
    <?php
} else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        ?>
        <div style="
            background-color: #e8f5e9;
            color: #27ae60;
            border: 1px solid #2ecc71;
            border-radius: 8px;
            padding: 20px;
            margin: 30px auto;
            width: 100%;
            max-width: 500px;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.2);
        ">
            <h3 style="margin-bottom: 10px;">✅ Registration Successful!</h3>
            <p>Welcome aboard! You can now log in to your account.</p>
            <a href="index.php" style="
                display: inline-block;
                margin-top: 15px;
                padding: 10px 20px;
                background-color: #2ecc71;
                color: #fff;
                text-decoration: none;
                border-radius: 25px;
                font-weight: bold;
                transition: background 0.3s ease;
            " onmouseover="this.style.background='#27ae60'" onmouseout="this.style.background='#2ecc71'">
                🏠 Go to Homepage
            </a>
        </div>
        <?php
    } else {
        echo "<p style='color:red;'>Something went wrong. Please try again.</p>";
    }
    $stmt->close();
}

$checkStmt->close();
$db->close();
?>
