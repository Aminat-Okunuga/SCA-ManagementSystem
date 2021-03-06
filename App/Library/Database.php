<?php
 
namespace Library;

class Database {

    // public $host = 'us-cdbr-east-02.cleardb.com';
    // public $username = "bd31784ad05ad3" ;
    // public $password = "46ec65b1";
    // public $db = 'heroku_4cbca9ff79d91ad';

    public $host = 'localhost';
    public $username = "root" ;
    public $password = "";
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

    public function prepare($sql) {
        $this->stmt = $this->conn->prepare($sql);
        if($this->stmt == false) {
            throw new \Exception($this->conn->error);
        }
    }

    public function execute() {
        if($this->result == false) {
            throw new \Exception($this->stmt->error);
        }
        $this->result = $this->stmt->execute();
        if($this->result == false) {
            throw new \Exception($this->stmt->error);
        }
    }

    public function select($sql) {
        $this->prepare($sql);

        $this->result = $this->stmt->execute();
        if($this->result == false) {
            throw new \Exception($this->stmt->error);
        }

        $this->result = $this->stmt->get_result();

        $all_rows = array();
        while($row = $this->result->fetch_assoc()) {
            array_push($all_rows, $row);
        }
        return $all_rows;
    }

}