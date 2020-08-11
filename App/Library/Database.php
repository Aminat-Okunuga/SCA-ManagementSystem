<?php

namespace Library;

class Database {

    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $db = 'sca_db';
    public $conn;
    public $stmt;
    public $result;

    public function connect() {
        $this->conn = new \mysqli($this->host, $this->username, $this->password, $this->db);
        if ($this->conn->connect_error) {
            throw new \Exception("Oops! Connection Failed!");
        }
    }

    public function __desctruct() {
        $this->stmt->close();
        $this->conn->close();
    }

}