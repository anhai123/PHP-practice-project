<?php

require_once 'base.php';
require_once 'entity/E_user.php';
class UserController extends Base
{
   

    public function viewHomepage() {
        require_once(__DIR__ . "/../views/home.php");
    }
    public function findById($id) {
        $userModel = new User();
        $user = $userModel->findById($id);
        return $user;
    }
     function store($data)
     {}
    function edit($id, $data){
        
    }
     function delete($id){}
     function list(){
     
        $query=mysqli_query($this->conn,"SELECT * FROM user");
        $users = array();
        while ($row = $query->fetch_assoc()) {
            $data[] = $row;
            $user = new E_user($row['id_user'],$row['firstName'], $row['lastName'], $row['email'], $row['phoneNumber']);
            $users[] = $user;
        }
        require_once(__DIR__ . '/../views/admin.php');
     }
    
};
