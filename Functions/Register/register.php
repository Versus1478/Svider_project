<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-form {
            background: #ffffff;
            padding: 30px 25px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .register-form input {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        .register-form input:focus {
            outline: none;
            border-color: #2ecc71;
        }
        .register-form button {
            width: 100%;
            padding: 12px;
            background: #2ecc71;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .register-form button:hover {
            background: #27ae60;
        }
        .register-form .message {
            margin-top: 15px;
            color: green;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
<form action="process_register.php" method="POST" class="register-form">
    <h2>Create Account</h2>
    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <button type="submit">Register</button>
    <?php if (!empty($_SESSION['register_success'])): ?>
        <div class="message"><?php echo $_SESSION['register_success']; unset($_SESSION['register_success']); ?></div>
    <?php endif; ?>
</form>
</body>
</html>
