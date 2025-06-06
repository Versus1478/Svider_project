<?php
require_once 'AdminPanel.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $admin = new AdminPanel('localhost', 'root', 'root', 'test');
    $admin->deleteMessage($id);
    $admin->closeConnection();

    header('Location: Test.php');
    exit();
} else {
    echo "Invalid or missing ID.";
}
