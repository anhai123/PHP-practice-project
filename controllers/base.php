<?php
require_once 'conn.php';
abstract class Base
{   
    protected $conn;
    public function __construct()
    {
        $db = new dbConnect();
        $this->conn = $db->getConnection();
    }
    abstract function store($data);
    abstract function edit($id, $data);
    abstract function delete($id);
    abstract function list();
    abstract function findById($id);
}