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
        body { font-family: Arial; background: #f7f7f7; padding: 20px; }
        form { background: #fff; padding: 20px; max-width: 500px; margin: auto; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        label { display: block; margin-top: 10px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; border-radius: 4px; border: 1px solid #ccc; }
        button { margin-top: 15px; padding: 10px 20px; background: #2ecc71; border: none; color: #fff; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

<h2>Edit Message</h2>
<form method="post">
    <input type="hidden" name="id" value="<?= $msg['id'] ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($msg['name']) ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($msg['email']) ?>" required>

    <label>Subject:</label>
    <input type="text" name="subject" value="<?= htmlspecialchars($msg['subject']) ?>" required>

    <label>Message:</label>
    <textarea name="message" rows="5" required><?= htmlspecialchars($msg['message']) ?></textarea>

    <button type="submit">💾 Save</button>
</form>

</body>
</html>
