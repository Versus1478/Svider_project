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

</body>
</html>
