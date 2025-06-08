<?php
class DatabaseManager {
    private $conn;

    public function __construct(string $host, string $user, string $password, string $dbname) {
        $this->conn = new mysqli($host, $user, $password);

        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }

        $this->createDatabase($dbname);

        if (!$this->conn->select_db($dbname)) {
            throw new Exception("Failed to select database: " . $this->conn->error);
        }

        $this->createMessagesTable();
    }

    private function createDatabase(string $dbname): void {
        $sql = "CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        if (!$this->conn->query($sql)) {
            throw new Exception("Database creation error: " . $this->conn->error);
        }
    }

    private function createMessagesTable(): void {
        $sql = "CREATE TABLE IF NOT EXISTS messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            subject VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

        if (!$this->conn->query($sql)) {
            throw new Exception("Table creation error: " . $this->conn->error);
        }
    }

    public function getConnection(): mysqli {
        return $this->conn;
    }

    public function close(): void {
        $this->conn->close();
    }
}
?>
