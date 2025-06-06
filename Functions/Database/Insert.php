<?php
require_once 'Post.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if ($name && $email && $subject && $message) {
        $inserter = new MessageInserter('localhost', 'root', 'root', 'test');
        $inserter->insertMessage($name, $email, $subject, $message);
        $inserter->close();
    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "Invalid request.";
}
?>
