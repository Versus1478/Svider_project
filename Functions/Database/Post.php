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
            // Output styled success message
            echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f8ff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .message-box {
            background: #dff0d8;
            color: #3c763d;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .message-box h2 {
            margin: 0 0 10px;
        }
        .btn-home {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #337ab7;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .btn-home:hover {
            background: #286090;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h2>Message sent successfully!</h2>
        <a href="../../index.php" class="btn-home">Back to Home</a>
    </div>
</body>
</html>
HTML;
        } else {
            echo "Insert failed: " . $stmt->error;
        }

        $stmt->close();
    }

    public function close() {
        $this->conn->close();
    }
}
?>
