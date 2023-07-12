<?php

require_once 'base.php';
require_once 'entity/E_user.php';
class Admin extends Base
{

    public function findById($id)
    {
    }

    function store($data)
    {
    }
    function edit($id, $data)
    {
        $updateField = implode(',', $data);

        if ($updateField && $id) {
            $sqlQuery = "UPDATE user SET $updateField WHERE id_user='" . $id . "'";
            $result = false;
            if ($this->conn->query($sqlQuery) === TRUE) {
                $result = true;
            }
            return $result;
        }
    }
    function delete($id)
    {
        $sqlQuery = "DELETE FROM user WHERE id_user='" . $id . "'";
        $result = false;
        if ($this->conn->query($sqlQuery) === TRUE) {
            $result = true;
        }
        return $result;
    }
    function list()
    {

        $query = mysqli_query($this->conn, "SELECT * FROM user");
        $users = array();
        while ($row = $query->fetch_assoc()) {
            $data[] = $row;
            $user = new E_user($row['id_user'], $row['firstName'], $row['lastName'], $row['email'], $row['phoneNumber']);
            $users[] = $user;
        }
        return $users;
    }
}
