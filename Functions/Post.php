<?php
class MessageInserter {
    private $conn;

    public function __construct($host, $user, $password, $dbname) {
        $this->conn = new mysqli($host, $user, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insertMessage($name, $email, $subject, $message) {
        $stmt = $this->conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            echo "Message inserted successfully.";
        } else {
            echo "Insert failed: " . $stmt->error;
        }

        $stmt->close();
    }

    public function close() {
        $this->conn->close();
    }
}

$inserter = new MessageInserter('localhost', 'root', 'root', 'test');

$name = 'John Doe';
$email = 'john@example.com';
$subject = 'Test Subject';
$message = 'This is a test message.';

$inserter->insertMessage($name, $email, $subject, $message);
$inserter->close();

?>
