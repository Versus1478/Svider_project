<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])): ?>
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
            }
            .message-box {
                background: #f5c6cb;
                padding: 20px 40px;
                border: 1px solid #f1b0b7;
                border-radius: 8px;
                text-align: center;
            }
            a.login-button {
                display: inline-block;
                margin-top: 15px;
                padding: 10px 20px;
                background-color: #721c24;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-weight: bold;
                transition: background-color 0.3s ease;
            }
            a.login-button:hover {
                background-color: #501217;
            }
        </style>
    </head>
    <body>
    <div class="message-box">
        <h2>Access Denied</h2>
        <p>You must be logged in as an admin to access this page.</p>
        <a href="../Login/login.php" class="login-button">Go to Login</a>
    </div>
    </body>
    </html>
    <?php
    exit();
endif;
?>


<?php
require_once 'AdminPanel.php';

$admin = new AdminPanel('localhost', 'root', 'root', 'test');
$messages = $admin->getAllMessages();
$admin->closeConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 5px;
            font-size: 14px;
        }

        .edit {
            background-color: #3498db;
            color: white;
        }

        .delete {
            background-color: #e74c3c;
            color: white;
        }

        .delete:hover {
            background-color: #c0392b;
        }

        .edit:hover {
            background-color: #2980b9;
        }

        .btn-back {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #2980b9;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2>📋 Admin Panel — Messages</h2>

<?php if (count($messages) > 0): ?>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($messages as $msg): ?>
            <tr>
                <td><?= htmlspecialchars($msg['id']) ?></td>
                <td><?= htmlspecialchars($msg['name']) ?></td>
                <td><?= htmlspecialchars($msg['email']) ?></td>
                <td><?= htmlspecialchars($msg['subject']) ?></td>
                <td><?= nl2br(htmlspecialchars($msg['message'])) ?></td>
                <td class="actions">
                    <a class="edit" href="edit.php?id=<?= $msg['id'] ?>">✏️ Edit</a>
                    <a class="delete" href="delete.php?id=<?= $msg['id'] ?>" onclick="return confirm('Are you sure you want to delete this message?')">🗑 Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No messages found.</p>
<?php endif; ?>

<div class="btn-container">
    <a href="../../index.php" class="btn-back">⬅️ Back to Home</a>
</div>

<div class="btn-container">
<a href="../logout.php" class="btn-logout">Logout</a>
</div>

</body>
</html>
