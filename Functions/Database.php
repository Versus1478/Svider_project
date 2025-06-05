<?php
class DatabaseManager {
    private $host;
    private $user;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $user, $password, $dbname) {
        $this->host     = $host;
        $this->user     = $user;
        $this->password = $password;
        $this->dbname   = $dbname;

        $this->connect();
        $this->createDatabase();
        $this->selectDatabase();
        $this->createTable();
        $this->close();
    }

    private function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function createDatabase() {
        $sql = "CREATE DATABASE IF NOT EXISTS {$this->dbname} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        if ($this->conn->query($sql) === TRUE) {
            echo "Database '{$this->dbname}' created or already exists.<br>";
        } else {
            die("Database creation error: " . $this->conn->error);
        }
    }

    private function selectDatabase() {
        $this->conn->select_db($this->dbname);
    }

    private function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            subject VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        if ($this->conn->query($sql) === TRUE) {
            echo "Table 'messages' created or already exists.<br>";
        } else {
            echo "Table creation error: " . $this->conn->error;
        }
    }

    private function close() {
        $this->conn->close();
    }
}

new DatabaseManager('localhost', 'root', 'root', 'contact_form_db');

?>
