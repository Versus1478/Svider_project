<?php

class adminPanel {
    private $conn;

    public function __construct($host, $user, $password, $dbname) {
        $this->conn = new mysqli($host, $user, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function createMessage($name, $email, $subject, $message) {
        $stmt = $this->conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        return $stmt->execute();
    }

    public function getAllMessages() {
        $result = $this->conn->query("SELECT * FROM messages ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMessageById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM messages WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateMessage($id, $name, $email, $subject, $message) {
        $stmt = $this->conn->prepare("UPDATE messages SET name = ?, email = ?, subject = ?, message = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $email, $subject, $message, $id);
        return $stmt->execute();
    }

    public function deleteMessage($id) {
        $stmt = $this->conn->prepare("DELETE FROM messages WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

