<?php
require_once 'adminPanel.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $admin = new adminPanel('localhost', 'root', 'root', 'test');
    $admin->deleteMessage($id);
    $admin->closeConnection();

    header('Location: adminPage.php');
    exit();
} else {
    echo "Invalid or missing ID.";
}
