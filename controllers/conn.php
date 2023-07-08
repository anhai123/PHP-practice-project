<?php

class dbConnect {
    protected $conn;
    
    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "db_practice");;
        if ($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }
    }
    
    public function getConnection() {
        return $this->conn;
    }
}

// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL" . mysqli_connect_errno();
// }
