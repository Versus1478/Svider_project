<?php
require_once 'AdminPanel.php';

$admin = new AdminPanel('localhost', 'root', 'root', 'test');

$admin->createMessage("Test User", "test@example.com", "Test Subject", "Test message content");

$messages = $admin->getAllMessages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .message {
            background-color: #fff;
            border-radius: 8px;
            padding: 15px 20px;
            margin: 15px auto;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 90%;
            max-width: 800px;
        }

        .message b {
            font-size: 1.1em;
            color: #2c3e50;
        }

        .message i {
            color: #7f8c8d;
            font-style: italic;
        }

        .message p {
            margin-top: 10px;
            color: #34495e;
        }

        .actions {
            margin-top: 10px;
        }

        .actions a {
            text-decoration: none;
            color: #2980b9;
            margin-right: 10px;
        }

        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>📬 All Messages</h2>

<?php foreach ($messages as $msg): ?>
    <div class="message">
        <b><?= htmlspecialchars($msg['name']) ?></b> (<?= htmlspecialchars($msg['email']) ?>)<br>
        <i><?= htmlspecialchars($msg['subject']) ?></i>
        <p><?= nl2br(htmlspecialchars($msg['message'])) ?></p>
        <div class="actions">
            <a href="edit.php?id=<?= $msg['id'] ?>">✏️ Edit</a>
            <a href="delete.php?id=<?= $msg['id'] ?>" onclick="return confirm('Are you sure you want to delete this message?')">🗑 Delete</a>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>

<?php
$admin->closeConnection();
?>

