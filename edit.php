<?php
require_once 'adminPanel.php';

$admin = new adminPanel('localhost', 'root', 'root', 'test');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $admin->updateMessage($id, $name, $email, $subject, $message);
    $admin->closeConnection();

    header('Location: adminPage.php');
    exit();
} elseif (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $msg = $admin->getMessageById($id);
    if (!$msg) {
        echo "Message not found.";
        exit();
    }
} else {
    echo "No ID specified.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Message</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #eef2f3, #8e9eab);
            padding: 40px;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px 40px 30px 20px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-out;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            margin-top: 15px;
            display: block;
            color: #34495e;
        }

        input, textarea {
            width: 100%;
            padding: 10px 12px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        button {
            background-color: #2ecc71;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            margin-top: 25px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #27ae60;
            transform: scale(1.02);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>✏️ Edit Message</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= $msg['id'] ?>">

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($msg['name']) ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($msg['email']) ?>" required>

        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" value="<?= htmlspecialchars($msg['subject']) ?>" required>

        <label for="message">Message</label>
        <textarea name="message" id="message" required><?= htmlspecialchars($msg['message']) ?></textarea>

        <button type="submit">💾 Save Changes</button>
    </form>
</div>

</body>
</html>
